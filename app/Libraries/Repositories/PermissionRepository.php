<?php

namespace App\Libraries\Repositories;


use App\Permission;
use Illuminate\Support\Facades\Schema;

class PermissionRepository
{

	/**
	 * Returns all Permissions
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Permission::all();
	}

	public function search($input)
    {
        $query = Permission::query();

        $columns = Schema::getColumnListing('permissions');
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
	 * Stores Permission into database
	 *
	 * @param array $input
	 *
	 * @return Permission
	 */
	public function store($input)
	{
		return Permission::create($input);
	}

	/**
	 * Find Permission by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Permission
	 */
	public function findPermissionById($id)
	{
		return Permission::find($id);
	}

	/**
	 * Updates Permission into database
	 *
	 * @param Permission $permission
	 * @param array $input
	 *
	 * @return Permission
	 */
	public function update($permission, $input)
	{
		$permission->fill($input);
		$permission->save();

		return $permission;
	}
}