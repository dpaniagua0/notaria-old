<?php

namespace App\Libraries\Repositories;


use App\Escritura;
use Illuminate\Support\Facades\Schema;

class EscrituraRepository
{

	/**
	 * Returns all Escrituras
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Escritura::all();
	}

	public function search($input)
    {
        $query = Escritura::query();

        $columns = Schema::getColumnListing('escrituras');
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
	 * Stores Escritura into database
	 *
	 * @param array $input
	 *
	 * @return Escritura
	 */
	public function store($input)
	{
		return Escritura::create($input);
	}

	/**
	 * Find Escritura by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Escritura
	 */
	public function findEscrituraById($id)
	{
		return Escritura::find($id);
	}

	/**
	 * Updates Escritura into database
	 *
	 * @param Escritura $escritura
	 * @param array $input
	 *
	 * @return Escritura
	 */
	public function update($escritura, $input)
	{
		$escritura->fill($input);
		$escritura->save();

		return $escritura;
	}
}