<?php

namespace App\Libraries\Repositories;


use App\Documento;
use Illuminate\Support\Facades\Schema;

class DocumentoRepository
{

	/**
	 * Returns all Documentos
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Documento::all();
	}

	public function search($input)
    {
        $query = Documento::query();

        $columns = Schema::getColumnListing('documentos');
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
	 * Stores Documento into database
	 *
	 * @param array $input
	 *
	 * @return Documento
	 */
	public function store($input)
	{
		return Documento::create($input);
	}

	/**
	 * Find Documento by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Documento
	 */
	public function findDocumentoById($id)
	{
		return Documento::find($id);
	}

	/**
	 * Updates Documento into database
	 *
	 * @param Documento $documento
	 * @param array $input
	 *
	 * @return Documento
	 */
	public function update($documento, $input)
	{
		$documento->fill($input);
		$documento->save();

		return $documento;
	}
}