<?php

use Illuminate\Database\Seeder;

class TaxonomiaCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::connection()->getDriverName() == 'pgsql') {
			DB::statement("update pg_class set relhastriggers=false where relname = 'taxonomia_categorias';");
		}

		if (DB::connection()->getDriverName() == 'pgsql') {
            //For PostgreSQL or anything else
            DB::statement('TRUNCATE TABLE taxonomia_categorias CASCADE');
        }

		$types = [
			[
                'id' => 'page',
                'nombre' => ' Categoría Página',
                'descripcion' => ''
            ],
            [
                'id' => 'post',
                'nombre' => ' Categoría Post',
                'descripcion' => ''
            ],
            [
                'id' => 'tag',
                'nombre' => ' Categoría Tag',
                'descripcion' => ''
            ],
		];

		DB::table('taxonomia_categorias')->insert($types);

		if (DB::connection()->getDriverName() == 'pgsql') {
			DB::statement("update pg_class set relhastriggers = true from pg_trigger where
                            pg_class.oid=tgrelid and relname='taxonomia_categorias';");
		}

    }
}
