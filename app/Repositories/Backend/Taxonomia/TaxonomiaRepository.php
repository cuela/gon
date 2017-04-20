<?php

namespace App\Repositories\Backend\Taxonomia;



interface TaxonomiaRepository
{

	public function getAll();

	public function getById($id);

	public function create(array $attributes);

	public function update($object, array $attributes);

	public function delete($object);

	public function getForDataTable($order_by, $sort);

}
