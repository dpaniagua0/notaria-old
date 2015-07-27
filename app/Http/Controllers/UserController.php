<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\UserRepository;
use Mitul\Controller\AppBaseController;
use App\User;
use Response;
use Flash;

class UserController extends AppBaseController
{

	/** @var  UserRepository */
	private $userRepository;

	function __construct(UserRepository $userRepo)
	{
		$this->userRepository = $userRepo;
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the User.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->userRepository->search($input);

		$users = $result[0];

		$attributes = $result[1];

		return view('users.index')
		    ->with('users', $users)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new User.
	 *
	 * @return Response
	 */
	public function create()
	{
		$roles = array();
		$tmp_roles = \DB::table("roles")
			->select('id','display_name')
			->get();


		foreach($tmp_roles as $role) {
			$roles[$role->id] = $role->display_name;
		}

		return view('users.create')
			->with('roles', $roles);
	}

	/**
	 * Store a newly created User in storage.
	 *
	 * @param CreateUserRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateUserRequest $request)
	{
		$user = new User;
		$user->name  = $request->input('name');
		$user->email = $request->input('email');
		$user->password = bcrypt($request->input('password'));
		$role_id =  $request->input('role_id');

		$user->save();
		$insertedId = $user->id;
		\DB::table('role_user')->insert(
			['user_id' => $insertedId, 'role_id' => $role_id]
		);

		Flash::message('User saved successfully.');

		return redirect(route('users.index'));
	}

	/**
	 * Display the specified User.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$user = $this->userRepository->findUserById($id);

		if(empty($user))
		{
			Flash::error('User not found');
			return redirect(route('users.index'));
		}

		return view('users.show')->with('user', $user);
	}

	/**
	 * Show the form for editing the specified User.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//$user = $this->userRepository->findUserById($id);

		$user = \DB::table('users')
			->select('users.*' , 'role_user.role_id as role_id')
			->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
			->where('users.id', '=', $id)
			->first();


		$roles = array();
		$tmp_roles = \DB::table("roles")
			->select('id','display_name')
			->get();


		foreach($tmp_roles as $role) {
			$roles[$role->id] = $role->display_name;
		}

		if(empty($user))
		{
			Flash::error('User not found');
			return redirect(route('users.index'));
		}

		return view('users.edit')
			->with(compact('user'))
			->with('roles', $roles);
	}

	/**
	 * Update the specified User in storage.
	 *
	 * @param  int    $id
	 * @param CreateUserRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateUserRequest $request)
	{
		$user = $this->userRepository->findUserById($id);

		if(empty($user))
		{
			Flash::error('User not found');
			return redirect(route('users.index'));
		}

		$user = $this->userRepository->update($user, $request->all());

		Flash::message('User updated successfully.');

		return redirect(route('users.index'));
	}

	/**
	 * Remove the specified User from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = $this->userRepository->findUserById($id);

		if(empty($user))
		{
			Flash::error('User not found');
			return redirect(route('users.index'));
		}

		$user->delete();

		Flash::message('User deleted successfully.');

		return redirect(route('users.index'));
	}

}
