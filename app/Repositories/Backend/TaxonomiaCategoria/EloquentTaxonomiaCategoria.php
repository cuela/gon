<?php

namespace App\Repositories\Backend\TaxonomiaCategoria;

use App\Models\TaxonomiaCategoria\TaxonomiaCategoria;

class EloquentTaxonomiaCategoria implements TaxonomiaCategoriaRepository
{

	private $model;


    public function __construct(TaxonomiaCategoria $model)
    {
        $this->model = $model;
    }

	public function getAll()
	{

		return $this->model->all();
	}

	public function getById($id)
	{
		return $this->findById($id);
	}

	public function create(array $attributes)
	{
		return $this->model->create($attributes);
	}

	public function update($object, array $attributes)
	{
		$object->update($attributes);

		if ($object) {
			app('cache')->flush();
		}

		return $object;
	}

	public function delete($object)
	{
		$object->delete();
		return true;
	}

	public function getForDataTable($order_by = 'orden', $sort = 'asc')
	{
		return $this->model->all();
	}
}
