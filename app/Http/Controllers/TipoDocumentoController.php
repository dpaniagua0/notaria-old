<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateTipoDocumentoRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\TipoDocumentoRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class TipoDocumentoController extends AppBaseController
{

	/** @var  TipoDocumentoRepository */
	private $tipoDocumentoRepository;

	function __construct(TipoDocumentoRepository $tipoDocumentoRepo)
	{
		$this->tipoDocumentoRepository = $tipoDocumentoRepo;
	}

	/**
	 * Display a listing of the TipoDocumento.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->tipoDocumentoRepository->search($input);

		$tipoDocumentos = $result[0];

		$attributes = $result[1];

		return view('tipoDocumentos.index')
		    ->with('tipoDocumentos', $tipoDocumentos)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new TipoDocumento.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tipoDocumentos.create');
	}

	/**
	 * Store a newly created TipoDocumento in storage.
	 *
	 * @param CreateTipoDocumentoRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateTipoDocumentoRequest $request)
	{
        $input = $request->all();

		$tipoDocumento = $this->tipoDocumentoRepository->store($input);

		Flash::message('TipoDocumento saved successfully.');

		return redirect(route('tipoDocumentos.index'));
	}

	/**
	 * Display the specified TipoDocumento.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$tipoDocumento = $this->tipoDocumentoRepository->findTipoDocumentoById($id);

		if(empty($tipoDocumento))
		{
			Flash::error('TipoDocumento not found');
			return redirect(route('tipoDocumentos.index'));
		}

		return view('tipoDocumentos.show')->with('tipoDocumento', $tipoDocumento);
	}

	/**
	 * Show the form for editing the specified TipoDocumento.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tipoDocumento = $this->tipoDocumentoRepository->findTipoDocumentoById($id);

		if(empty($tipoDocumento))
		{
			Flash::error('TipoDocumento not found');
			return redirect(route('tipoDocumentos.index'));
		}

		return view('tipoDocumentos.edit')->with('tipoDocumento', $tipoDocumento);
	}

	/**
	 * Update the specified TipoDocumento in storage.
	 *
	 * @param  int    $id
	 * @param CreateTipoDocumentoRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateTipoDocumentoRequest $request)
	{
		$tipoDocumento = $this->tipoDocumentoRepository->findTipoDocumentoById($id);

		if(empty($tipoDocumento))
		{
			Flash::error('TipoDocumento not found');
			return redirect(route('tipoDocumentos.index'));
		}

		$tipoDocumento = $this->tipoDocumentoRepository->update($tipoDocumento, $request->all());

		Flash::message('TipoDocumento updated successfully.');

		return redirect(route('tipoDocumentos.index'));
	}

	/**
	 * Remove the specified TipoDocumento from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$tipoDocumento = $this->tipoDocumentoRepository->findTipoDocumentoById($id);

		if(empty($tipoDocumento))
		{
			Flash::error('TipoDocumento not found');
			return redirect(route('tipoDocumentos.index'));
		}

		$tipoDocumento->delete();

		Flash::message('TipoDocumento deleted successfully.');

		return redirect(route('tipoDocumentos.index'));
	}

}
