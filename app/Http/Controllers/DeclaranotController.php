<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateDeclaranotRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\DeclaranotRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class DeclaranotController extends AppBaseController
{

	/** @var  DeclaranotRepository */
	private $declaranotRepository;

	function __construct(DeclaranotRepository $declaranotRepo)
	{
		$this->declaranotRepository = $declaranotRepo;
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the Declaranot.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->declaranotRepository->search($input);

		$declaranots = $result[0];

		$attributes = $result[1];

		return view('declaranots.index')
		    ->with('declaranots', $declaranots)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Declaranot.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('declaranots.create');
	}

	/**
	 * Store a newly created Declaranot in storage.
	 *
	 * @param CreateDeclaranotRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateDeclaranotRequest $request)
	{
        $input = $request->all();

		$declaranot = $this->declaranotRepository->store($input);

		Flash::message('Archivo creado.');

		return redirect(route('declaranots.index'));
	}

	/**
	 * Display the specified Declaranot.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$declaranot = $this->declaranotRepository->findDeclaranotById($id);

		if(empty($declaranot))
		{
			Flash::error('Archivo no encontado');
			return redirect(route('declaranots.index'));
		}

		return view('declaranots.show')->with('declaranot', $declaranot);
	}

	/**
	 * Show the form for editing the specified Declaranot.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$declaranot = $this->declaranotRepository->findDeclaranotById($id);

		if(empty($declaranot))
		{
			Flash::error('Archivo no encontrado');
			return redirect(route('declaranots.index'));
		}

		return view('declaranots.edit')->with('declaranot', $declaranot);
	}

	/**
	 * Update the specified Declaranot in storage.
	 *
	 * @param  int    $id
	 * @param CreateDeclaranotRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateDeclaranotRequest $request)
	{
		$declaranot = $this->declaranotRepository->findDeclaranotById($id);

		if(empty($declaranot))
		{
			Flash::error('Archivo no encontrado');
			return redirect(route('declaranots.index'));
		}

		$declaranot = $this->declaranotRepository->update($declaranot, $request->all());

		Flash::message('Archivo actualizado.');

		return redirect(route('declaranots.index'));
	}

	/**
	 * Remove the specified Declaranot from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$declaranot = $this->declaranotRepository->findDeclaranotById($id);

		if(empty($declaranot))
		{
			Flash::error('Archivo no encontrado');
			return redirect(route('declaranots.index'));
		}

		$declaranot->delete();

		Flash::message('Archivo eliminado.');

		return redirect(route('declaranots.index'));
	}

	/**
	 * Generate PDF
	 *
	 * @param int $id
	 *
	 * @return Response
	 */
	public function generatePDF($id){
		$data = $this->declaranotRepository->findDeclaranotById($id);
		$pdf = \PDF::loadView('pdf.reporte', array('data' => $data)	);
		return $pdf->download('reporte.pdf');
	}
}
