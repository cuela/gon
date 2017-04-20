<?php

namespace App\Repositories\Backend\TaxonomiaCategoria;



interface TaxonomiaCategoriaRepository
{

	public function getAll();

	public function getById($id);

	public function create(array $attributes);

	public function update($object, array $attributes);

	public function delete($object);

	public function getForDataTable($order_by, $sort);

}
