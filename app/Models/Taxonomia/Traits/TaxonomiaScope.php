<?php

namespace App\Models\Taxonomia\Traits;


trait TaxonomiaScope
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