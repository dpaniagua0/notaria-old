<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateAdquirienteRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\AdquirienteRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class AdquirienteController extends AppBaseController
{

	/** @var  AdquirienteRepository */
	private $adquirienteRepository;

	function __construct(AdquirienteRepository $adquirienteRepo)
	{
		$this->adquirienteRepository = $adquirienteRepo;
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the Adquiriente.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->adquirienteRepository->search($input);

		$adquirientes = $result[0];

		$attributes = $result[1];

		return view('adquirientes.index')
		    ->with('adquirientes', $adquirientes)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Adquiriente.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('adquirientes.create');
	}

	/**
	 * Store a newly created Adquiriente in storage.
	 *
	 * @param CreateAdquirienteRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateAdquirienteRequest $request)
	{
        $input = $request->all();

		$adquiriente = $this->adquirienteRepository->store($input);

		Flash::message('Adquiriente saved successfully.');

		return redirect(route('adquirientes.index'));
	}

	/**
	 * Display the specified Adquiriente.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$adquiriente = $this->adquirienteRepository->findAdquirienteById($id);

		if(empty($adquiriente))
		{
			Flash::error('Adquiriente not found');
			return redirect(route('adquirientes.index'));
		}

		return view('adquirientes.show')->with('adquiriente', $adquiriente);
	}

	/**
	 * Show the form for editing the specified Adquiriente.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$adquiriente = $this->adquirienteRepository->findAdquirienteById($id);

		if(empty($adquiriente))
		{
			Flash::error('Adquiriente not found');
			return redirect(route('adquirientes.index'));
		}

		return view('adquirientes.edit')->with('adquiriente', $adquiriente);
	}

	/**
	 * Update the specified Adquiriente in storage.
	 *
	 * @param  int    $id
	 * @param CreateAdquirienteRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateAdquirienteRequest $request)
	{
		$adquiriente = $this->adquirienteRepository->findAdquirienteById($id);

		if(empty($adquiriente))
		{
			Flash::error('Adquiriente not found');
			return redirect(route('adquirientes.index'));
		}

		$adquiriente = $this->adquirienteRepository->update($adquiriente, $request->all());

		Flash::message('Adquiriente updated successfully.');

		return redirect(route('adquirientes.index'));
	}

	/**
	 * Remove the specified Adquiriente from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$adquiriente = $this->adquirienteRepository->findAdquirienteById($id);

		if(empty($adquiriente))
		{
			Flash::error('Adquiriente not found');
			return redirect(route('adquirientes.index'));
		}

		$adquiriente->delete();

		Flash::message('Adquiriente deleted successfully.');

		return redirect(route('adquirientes.index'));
	}

}
