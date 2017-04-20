<?php

namespace App\Models\Transparencia\ArticuloTraits;


trait ArticuloScope
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