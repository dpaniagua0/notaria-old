<?php

namespace App\Libraries\Repositories;


use App\TipoDocumento;
use Illuminate\Support\Facades\Schema;

class TipoDocumentoRepository
{

	/**
	 * Returns all TipoDocumentos
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return TipoDocumento::all();
	}

	public function search($input)
    {
        $query = TipoDocumento::query();

        $columns = Schema::getColumnListing('tipo_documentos');
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
	 * Stores TipoDocumento into database
	 *
	 * @param array $input
	 *
	 * @return TipoDocumento
	 */
	public function store($input)
	{
		return TipoDocumento::create($input);
	}

	/**
	 * Find TipoDocumento by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|TipoDocumento
	 */
	public function findTipoDocumentoById($id)
	{
		return TipoDocumento::find($id);
	}

	/**
	 * Updates TipoDocumento into database
	 *
	 * @param TipoDocumento $tipoDocumento
	 * @param array $input
	 *
	 * @return TipoDocumento
	 */
	public function update($tipoDocumento, $input)
	{
		$tipoDocumento->fill($input);
		$tipoDocumento->save();

		return $tipoDocumento;
	}
}