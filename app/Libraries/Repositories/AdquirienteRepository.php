<?php

namespace App\Libraries\Repositories;


use App\Adquiriente;
use Illuminate\Support\Facades\Schema;

class AdquirienteRepository
{

	/**
	 * Returns all Adquirientes
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Adquiriente::all();
	}

	public function search($input)
    {
        $query = Adquiriente::query();

        $columns = Schema::getColumnListing('adquirientes');
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
	 * Stores Adquiriente into database
	 *
	 * @param array $input
	 *
	 * @return Adquiriente
	 */
	public function store($input)
	{
		return Adquiriente::create($input);
	}

	/**
	 * Find Adquiriente by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Adquiriente
	 */
	public function findAdquirienteById($id)
	{
		return Adquiriente::find($id);
	}

	/**
	 * Updates Adquiriente into database
	 *
	 * @param Adquiriente $adquiriente
	 * @param array $input
	 *
	 * @return Adquiriente
	 */
	public function update($adquiriente, $input)
	{
		$adquiriente->fill($input);
		$adquiriente->save();

		return $adquiriente;
	}
}