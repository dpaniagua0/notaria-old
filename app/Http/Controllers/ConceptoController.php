<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateConceptoRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\ConceptoRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class ConceptoController extends AppBaseController
{

	/** @var  ConceptoRepository */
	private $conceptoRepository;

	function __construct(ConceptoRepository $conceptoRepo)
	{
		$this->conceptoRepository = $conceptoRepo;
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the Concepto.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->conceptoRepository->search($input);

		$conceptos = $result[0];

		$attributes = $result[1];

		return view('conceptos.index')
		    ->with('conceptos', $conceptos)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Concepto.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('conceptos.create');
	}

	/**
	 * Store a newly created Concepto in storage.
	 *
	 * @param CreateConceptoRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateConceptoRequest $request)
	{
        $input = $request->all();

		$concepto = $this->conceptoRepository->store($input);

		Flash::message('Concepto saved successfully.');

		return redirect(route('conceptos.index'));
	}

	/**
	 * Display the specified Concepto.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$concepto = $this->conceptoRepository->findConceptoById($id);

		if(empty($concepto))
		{
			Flash::error('Concepto not found');
			return redirect(route('conceptos.index'));
		}

		return view('conceptos.show')->with('concepto', $concepto);
	}

	/**
	 * Show the form for editing the specified Concepto.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$concepto = $this->conceptoRepository->findConceptoById($id);

		if(empty($concepto))
		{
			Flash::error('Concepto not found');
			return redirect(route('conceptos.index'));
		}

		return view('conceptos.edit')->with('concepto', $concepto);
	}

	/**
	 * Update the specified Concepto in storage.
	 *
	 * @param  int    $id
	 * @param CreateConceptoRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateConceptoRequest $request)
	{
		$concepto = $this->conceptoRepository->findConceptoById($id);

		if(empty($concepto))
		{
			Flash::error('Concepto not found');
			return redirect(route('conceptos.index'));
		}

		$concepto = $this->conceptoRepository->update($concepto, $request->all());

		Flash::message('Concepto updated successfully.');

		return redirect(route('conceptos.index'));
	}

	/**
	 * Remove the specified Concepto from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$concepto = $this->conceptoRepository->findConceptoById($id);

		if(empty($concepto))
		{
			Flash::error('Concepto not found');
			return redirect(route('conceptos.index'));
		}

		$concepto->delete();

		Flash::message('Concepto deleted successfully.');

		return redirect(route('conceptos.index'));
	}

}
