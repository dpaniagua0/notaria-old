<?php

namespace App\Libraries\Repositories;


use App\Role;
use Illuminate\Support\Facades\Schema;

class RoleRepository
{

	/**
	 * Returns all Roles
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Role::all();
	}

	public function search($input)
    {
        $query = Role::query();

        $columns = Schema::getColumnListing('roles');
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
	 * Stores Role into database
	 *
	 * @param array $input
	 *
	 * @return Role
	 */
	public function store($input)
	{
		return Role::create($input);
	}

	/**
	 * Find Role by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Role
	 */
	public function findRoleById($id)
	{
		return Role::find($id);
	}

	/**
	 * Updates Role into database
	 *
	 * @param Role $role
	 * @param array $input
	 *
	 * @return Role
	 */
	public function update($role, $input)
	{
		$role->fill($input);
		$role->save();

		return $role;
	}
}