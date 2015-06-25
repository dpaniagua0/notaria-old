<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateRoleRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\RoleRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class RoleController extends AppBaseController
{

	/** @var  RoleRepository */
	private $roleRepository;

	function __construct(RoleRepository $roleRepo)
	{
		$this->roleRepository = $roleRepo;
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the Role.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->roleRepository->search($input);

		$roles = $result[0];

		$attributes = $result[1];

		return view('roles.index')
		    ->with('roles', $roles)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Role.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('roles.create');
	}

	/**
	 * Store a newly created Role in storage.
	 *
	 * @param CreateRoleRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateRoleRequest $request)
	{
        $input = $request->all();

		$role = $this->roleRepository->store($input);

		Flash::message('Role saved successfully.');

		return redirect(route('roles.index'));
	}

	/**
	 * Display the specified Role.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$role = $this->roleRepository->findRoleById($id);

		if(empty($role))
		{
			Flash::error('Role not found');
			return redirect(route('roles.index'));
		}

		return view('roles.show')->with('role', $role);
	}

	/**
	 * Show the form for editing the specified Role.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$role = $this->roleRepository->findRoleById($id);

		if(empty($role))
		{
			Flash::error('Role not found');
			return redirect(route('roles.index'));
		}

		return view('roles.edit')->with('role', $role);
	}

	/**
	 * Update the specified Role in storage.
	 *
	 * @param  int    $id
	 * @param CreateRoleRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateRoleRequest $request)
	{
		$role = $this->roleRepository->findRoleById($id);

		if(empty($role))
		{
			Flash::error('Role not found');
			return redirect(route('roles.index'));
		}

		$role = $this->roleRepository->update($role, $request->all());

		Flash::message('Role updated successfully.');

		return redirect(route('roles.index'));
	}

	/**
	 * Remove the specified Role from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$role = $this->roleRepository->findRoleById($id);

		if(empty($role))
		{
			Flash::error('Role not found');
			return redirect(route('roles.index'));
		}

		$role->delete();

		Flash::message('Role deleted successfully.');

		return redirect(route('roles.index'));
	}

}
