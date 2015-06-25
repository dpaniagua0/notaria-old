<?php

namespace App\Libraries\Repositories;


use App\User;
use Illuminate\Support\Facades\Schema;

class UserRepository
{

	/**
	 * Returns all Users
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return User::all();
	}

	public function search($input)
    {
        $query = User::query();

        $columns = Schema::getColumnListing('users');
        $attributes = array();

        foreach($columns as $attribute){
            if(isset($input[$attribute]))
            {
                $query->where($attribute, $input[$attribute]);
                $attributes[$attribute] =  $input[$attribute];
            }else{
                $attributes[$attribute] =  null;
            }
        };

        return [$query->get(), $attributes];

    }

	/**
	 * Stores User into database
	 *
	 * @param array $input
	 *
	 * @return User
	 */
	public function store($input)
	{
		return User::create($input);
	}

	/**
	 * Find User by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|User
	 */
	public function findUserById($id)
	{
		return User::find($id);
	}

	/**
	 * Updates User into database
	 *
	 * @param User $user
	 * @param array $input
	 *
	 * @return User
	 */
	public function update($user, $input)
	{
		$user->fill($input);
		$user->save();

		return $user;
	}
}