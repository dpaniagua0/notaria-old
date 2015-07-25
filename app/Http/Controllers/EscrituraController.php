<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateEscrituraRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\EscrituraRepository;
use Mitul\Controller\AppBaseController;
use Response;
use App\Escritura;
use Flash;

class EscrituraController extends AppBaseController
{

	/** @var  EscrituraRepository */
	private $escrituraRepository;

	function __construct(EscrituraRepository $escrituraRepo)
	{
		$this->escrituraRepository = $escrituraRepo;
	}

	/**
	 * Display a listing of the Escritura.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$title_number = $request->get('search');

		$escrituras = Escritura::filterTitle($title_number)->orderBy('id', 'DESC')->paginate(15);
		return view('escrituras.index')->with('escrituras', $escrituras);
	}

	/**
	 * Show the form for creating a new Escritura.
	 *
	 * @return Response
	 */
	public function create()
	{
		$allusers = array();
		$users = \DB::table('users')
			->select('id','name')
			->get();
		foreach($users as $user) {
			$allusers[$user->id] = $user->name;
		}

		return view('escrituras.create')
			->with("users", $allusers);
	}

	/**
	 * Store a newly created Escritura in storage.
	 *
	 * @param CreateEscrituraRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateEscrituraRequest $request)
	{

		$escritura = new Escritura;
		$escritura->numero_escritura = $request->input('numero_escritura');
		$escritura->fecha_entrega = date("Y-m-d", strtotime($request->input('fecha_entrega')));
		$escritura->fecha_alta = date("Y-m-d", strtotime($request->input('fecha_alta')));
		$escritura->titular = $request->input('titular');
		$escritura->estado = $request->input('estado');
		$escritura->costo = $request->input('costo');
		$escritura->servicio = $request->input('servicio');
		$escritura->user_id = $request->input('user_id');

		$file_name = $request->input('numero_escritura').'.'.$request->file('escritura')->getClientOriginalExtension();
		$path = base_path() . '/public/escrituras_folder/'.$request->input('numero_escritura').'/'.$file_name;
		$escritura->path = $path;
		$request->file('escritura')->move(
			base_path() . '/public/escrituras_folder/'.$request->input('numero_escritura').'/', $file_name
		);

		$escritura->path = $path;
		$escritura->file_extension = $request->file('escritura')->getClientOriginalExtension();
		$escritura->save();

		Flash::message('Escritura almacenada.');

		return redirect(route('escrituras.index'));
	}

	/**
	 * Display the specified Escritura.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$escritura = $this->escrituraRepository->findEscrituraById($id);

		if(empty($escritura))
		{
			Flash::error('Escritura not found');
			return redirect(route('escrituras.index'));
		}

		return view('escrituras.show')->with('escritura', $escritura);
	}

	/**
	 * Show the form for editing the specified Escritura.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$escritura = $this->escrituraRepository->findEscrituraById($id);
		$allusers = array();

		$users = \DB::table('users')
			->select('id','name')
			->get();

		foreach($users as $user) {
			$allusers[$user->id] = $user->name;
		}
		if(empty($escritura))
		{
			Flash::error('Escritura no encontrado');
			return redirect(route('escrituras.index'));
		}

		return view('escrituras.edit')
			->with('escritura', $escritura)
			->with('users', $allusers);
	}

	/**
	 * Update the specified Escritura in storage.
	 *
	 * @param  int    $id
	 * @param CreateEscrituraRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateEscrituraRequest $request)
	{
		$escritura = Escritura::find($id);

		if(empty($escritura))
		{
			Flash::error('Escritura no encontrada');
			return redirect(route('escrituras.index'));
		}

		$escritura->numero_escritura = $request->input('numero_escritura');
		$escritura->fecha_entrega = date("Y-m-d", strtotime($request->input('fecha_entrega')));
		$escritura->fecha_alta = date("Y-m-d", strtotime($request->input('fecha_alta')));
		$escritura->titular = $request->input('titular');
		$escritura->estado = $request->input('estado');
		$escritura->costo = $request->input('costo');
		$escritura->servicio = $request->input('servicio');
		$escritura->user_id = $request->input('user_id');

		$file_name = $request->input('numero_escritura').'.'.$request->file('escritura')->getClientOriginalExtension();
		$path = base_path() . '/public/escrituras_folder/'.$request->input('numero_escritura').'/'.$file_name;
		$escritura->path = $path;
		$request->file('escritura')->move(
			base_path() . '/public/escrituras_folder/'.$request->input('numero_escritura').'/', $file_name
		);

		$escritura->path = $path;
		$escritura->file_extension = $request->file('escritura')->getClientOriginalExtension();
		$escritura->save();

		Flash::message('Escritura actualizada.');

		return redirect(route('escrituras.index'));
	}

	/**
	 * Remove the specified Escritura from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$escritura = $this->escrituraRepository->findEscrituraById($id);

		if(empty($escritura))
		{
			Flash::error('Escritura no econtrada');
			return redirect(route('escrituras.index'));
		}

		$escritura->delete();

		Flash::message('Escritura eliminada.');

		return redirect(route('escrituras.index'));
	}

	/**
	 * Download escritura
	 * @param $id
	 *
	 * @return Response
	 */
	public function downloadEscritura($id){
		$escritura = Escritura::find($id);
		$file = $escritura->path;
		$file_name = $escritura->numero_escritura;
		$file_extension = $escritura->file_extension;

		return response()->download($file,$file_name.".".$file_extension);
	}

}
