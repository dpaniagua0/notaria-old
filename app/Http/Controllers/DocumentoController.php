<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateDocumentoRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\DocumentoRepository;
use Mitul\Controller\AppBaseController;
use App\Documento;
use Response;
use Flash;

class DocumentoController extends AppBaseController
{

	/** @var  DocumentoRepository */
	private $documentoRepository;

	function __construct(DocumentoRepository $documentoRepo)
	{
		$this->documentoRepository = $documentoRepo;
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the Documento.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{

		$file_number = $request->get('search');

		$documents = Documento::number($file_number)->orderBy('id', 'DESC')->paginate(15);
		return view('documentos.index')->with('documentos', $documents);
	}

	/**
	 * Show the form for creating a new Documento.
	 *
	 * @return Response
	 */
	public function create()
	{
		$types = array();
		$allusers = array();
		$users = \DB::table('users')
			->select('id','name')
			->get();

		$document_types = \DB::table('tipo_documentos')
			->select('id','tipo')
			->get();

		foreach($document_types as $type) {
			$types[$type->id] = $type->tipo;
		}

		foreach($users as $user) {
			$allusers[$user->id] = $user->name;
		}

		return view('documentos.create')
			->with("types",$types)
			->with("users",$allusers);
	}

	/**
	 * Store a newly created Documento in storage.
	 *
	 * @param CreateDocumentoRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateDocumentoRequest $request)
	{

		$document = new Documento;
		$document->numero_documento = $request->input('numero_documento');
		$document->fecha_captura = date("Y-m-d", strtotime($request->input('fecha_captura')));
		$document->tipo_documento = $request->input('tipo_documento');
		$document->fecha_llegada = date("Y-m-d", strtotime($request->input('fecha_llegada')));
		$document->user_id = $request->input('user_id');
		$document->costo = $request->input('costo');
		$document->tipo_servicio = $request->input('tipo_servicio');


		$file_name = $request->input('numero_documento').'.'.$request->file('documento')->getClientOriginalExtension();
		$path = base_path() . '/public/documents/'.$request->input('numero_documento').'/'.$file_name;
		$document->path = $path;
		$request->file('documento')->move(
			base_path() . '/public/documents/'.$request->input('numero_documento').'/', $file_name
		);

		$document->path = $path;
		$document->file_extension = $request->file('documento')->getClientOriginalExtension();
		$document->save();




		Flash::message('Documento almacenado.');

		return redirect(route('documentos.index'));
	}

	/**
	 * Display the specified Documento.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$documento = $this->documentoRepository->findDocumentoById($id);

		if(empty($documento))
		{
			Flash::error('Documento no encontrado');
			return redirect(route('documentos.index'));
		}

		return view('documentos.show')->with('documento', $documento);
	}

	/**
	 * Show the form for editing the specified Documento.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$documento = $this->documentoRepository->findDocumentoById($id);
		$types = array();
		$allusers = array();

		$users = \DB::table('users')
			->select('id','name')
			->get();

		$document_types = \DB::table('tipo_documentos')
			->select('id','tipo')
			->get();

		foreach($document_types as $type) {
			$types[$type->id] = $type->tipo;
		}

		foreach($users as $user) {
			$allusers[$user->id] = $user->name;
		}

		if(empty($documento))
		{
			Flash::error('Documento no encontrado');
			return redirect(route('documentos.index'));
		}

		return view('documentos.edit')
			->with('documento', $documento)
			->with('types',$types)
			->with('users', $allusers);
	}

	/**
	 * Update the specified Documento in storage.
	 *
	 * @param  int    $id
	 * @param CreateDocumentoRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateDocumentoRequest $request)
	{
		$document = Documento::find($id);

		if(empty($document))
		{
			Flash::error('Documento no encontrado');
			return redirect(route('documentos.index'));
		}

		$document->numero_documento = $request->input('numero_documento');
		$document->fecha_captura = date("Y-m-d", strtotime($request->input('fecha_captura')));
		$document->tipo_documento = $request->input('tipo_documento');
		$document->fecha_llegada = date("Y-m-d", strtotime($request->input('fecha_llegada')));
		$document->user_id = $request->input('user_id');
		$document->costo = $request->input('costo');
		$document->tipo_servicio = $request->input('tipo_servicio');


		$file_name = $request->input('numero_documento').'.'.$request->file('documento')->getClientOriginalExtension();
		$path = base_path() . '/public/documents/'.$request->input('numero_documento').'/'.$file_name;
		$document->path = $path;
		$request->file('documento')->move(
			base_path() . '/public/documents/'.$request->input('numero_documento').'/', $file_name
		);

		$document->path = $path;
		$document->file_extension = $request->file('documento')->getClientOriginalExtension();
		$document->save();


		Flash::message('Documento actuzalizado.');

		return redirect(route('documentos.index'));
	}

	/**
	 * Remove the specified Documento from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$documento = $this->documentoRepository->findDocumentoById($id);

		if(empty($documento))
		{
			Flash::error('Documento no encontrado');
			return redirect(route('documentos.index'));
		}

		$documento->delete();

		Flash::message('Documento eliminado.');

		return redirect(route('documentos.index'));
	}

	/**
	 * Download document
	 * @param $document_number
	 *
	 * @return Response
	 */
	public function downloadDocument($document_number){
		$documento = Documento::where('numero_documento',$document_number)->firstOrFail();
		$file = $documento->path;
		$file_name = $documento->numero_documento;
		$file_extension = $documento->file_extension;

		return response()->download($file,$file_name.".".$file_extension);
	}
}
