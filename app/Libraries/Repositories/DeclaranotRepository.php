<?php

namespace App\Libraries\Repositories;


use App\Declaranot;
use Illuminate\Support\Facades\Schema;

class DeclaranotRepository
{

	/**
	 * Returns all Declaranots
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Declaranot::all();
	}

	public function search($input)
    {
        $query = Declaranot::query();

        $columns = Schema::getColumnListing('declaranots');
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
	 * Stores Declaranot into database
	 *
	 * @param array $input
	 *
	 * @return Declaranot
	 */
	public function store($input)
	{
		return Declaranot::create($input);
	}

	/**
	 * Find Declaranot by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Declaranot
	 */
	public function findDeclaranotById($id)
	{
		return Declaranot::find($id);
	}

	/**
	 * Updates Declaranot into database
	 *
	 * @param Declaranot $declaranot
	 * @param array $input
	 *
	 * @return Declaranot
	 */
	public function update($declaranot, $input)
	{
		$declaranot->fill($input);
		$declaranot->save();

		return $declaranot;
	}
}