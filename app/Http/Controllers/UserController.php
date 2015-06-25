<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\UserRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class UserController extends AppBaseController
{

	/** @var  UserRepository */
	private $userRepository;

	function __construct(UserRepository $userRepo)
	{
		$this->userRepository = $userRepo;
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
		return view('users.create');
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
        $input = $request->all();

		$user = $this->userRepository->store($input);

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
		$user = $this->userRepository->findUserById($id);

		if(empty($user))
		{
			Flash::error('User not found');
			return redirect(route('users.index'));
		}

		return view('users.edit')->with('user', $user);
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