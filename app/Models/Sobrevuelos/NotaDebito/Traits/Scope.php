<?php

namespace App\Models\Sobrevuelos\NotaDebito\Traits;


trait Scope
{

	/**
	 * @param $query
	 * @param string $direction
	 * @return mixed
	 */
	public function scopeSort($query, $direction = "asc") {
		return $query->orderBy('sort', $direction);
	}
}