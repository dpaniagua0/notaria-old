<?php

namespace App\Libraries\Repositories;


use App\Concepto;
use Illuminate\Support\Facades\Schema;

class ConceptoRepository
{

	/**
	 * Returns all Conceptos
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Concepto::all();
	}

	public function search($input)
    {
        $query = Concepto::query();

        $columns = Schema::getColumnListing('conceptos');
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
	 * Stores Concepto into database
	 *
	 * @param array $input
	 *
	 * @return Concepto
	 */
	public function store($input)
	{
		return Concepto::create($input);
	}

	/**
	 * Find Concepto by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Concepto
	 */
	public function findConceptoById($id)
	{
		return Concepto::find($id);
	}

	/**
	 * Updates Concepto into database
	 *
	 * @param Concepto $concepto
	 * @param array $input
	 *
	 * @return Concepto
	 */
	public function update($concepto, $input)
	{
		$concepto->fill($input);
		$concepto->save();

		return $concepto;
	}
}