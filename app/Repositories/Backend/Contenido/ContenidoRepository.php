<?php

namespace App\Repositories\Backend\Contenido;



interface ContenidoRepository
{

	public function getAll();

	public function getById($id);

	public function create(array $attributes);

	public function update($object, array $attributes);

	public function delete($object);
	

	public function getForDataTable($request, $order_by, $sort);
	public function getForDataTableLista($request, $order_by, $sort);

}
