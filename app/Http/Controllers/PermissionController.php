<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePermissionRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\PermissionRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class PermissionController extends AppBaseController
{

	/** @var  PermissionRepository */
	private $permissionRepository;

	function __construct(PermissionRepository $permissionRepo)
	{
		$this->permissionRepository = $permissionRepo;
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the Permission.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->permissionRepository->search($input);

		$permissions = $result[0];

		$attributes = $result[1];

		return view('permissions.index')
		    ->with('permissions', $permissions)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Permission.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('permissions.create');
	}

	/**
	 * Store a newly created Permission in storage.
	 *
	 * @param CreatePermissionRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatePermissionRequest $request)
	{
        $input = $request->all();

		$permission = $this->permissionRepository->store($input);

		Flash::message('Permission saved successfully.');

		return redirect(route('permissions.index'));
	}

	/**
	 * Display the specified Permission.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$permission = $this->permissionRepository->findPermissionById($id);

		if(empty($permission))
		{
			Flash::error('Permission not found');
			return redirect(route('permissions.index'));
		}

		return view('permissions.show')->with('permission', $permission);
	}

	/**
	 * Show the form for editing the specified Permission.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$permission = $this->permissionRepository->findPermissionById($id);

		if(empty($permission))
		{
			Flash::error('Permission not found');
			return redirect(route('permissions.index'));
		}

		return view('permissions.edit')->with('permission', $permission);
	}

	/**
	 * Update the specified Permission in storage.
	 *
	 * @param  int    $id
	 * @param CreatePermissionRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreatePermissionRequest $request)
	{
		$permission = $this->permissionRepository->findPermissionById($id);

		if(empty($permission))
		{
			Flash::error('Permission not found');
			return redirect(route('permissions.index'));
		}

		$permission = $this->permissionRepository->update($permission, $request->all());

		Flash::message('Permission updated successfully.');

		return redirect(route('permissions.index'));
	}

	/**
	 * Remove the specified Permission from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$permission = $this->permissionRepository->findPermissionById($id);

		if(empty($permission))
		{
			Flash::error('Permission not found');
			return redirect(route('permissions.index'));
		}

		$permission->delete();

		Flash::message('Permission deleted successfully.');

		return redirect(route('permissions.index'));
	}

}
