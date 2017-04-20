<?php

use Illuminate\Database\Seeder;

class CategoriaFragmentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::connection()->getDriverName() == 'pgsql') {
			DB::statement("update pg_class set relhastriggers=false where relname = 'fragmento_categorias';");
		}
		if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

		DB::table('fragmento_categorias')->truncate();

		$types = [
			[
				'id' => 1,
				'nombre' => 'Publicidad',
				'tipo'=>2				
			],
			[
				'id' => 2,
				'nombre' => 'Contenido',
				'tipo'=>2				
			],
			[
				'id' => 3,
				'nombre' => 'Sistema',
				'tipo'=>2				
			],
			[
				'id' => 4,
				'nombre' => 'Publicidad',
				'tipo'=>1				
			],
			[
				'id' => 5,
				'nombre' => 'Contenido',
				'tipo'=>1				
			],
			[
				'id' => 6,
				'nombre' => 'Sistema',
				'tipo'=>1				
			],
			[
				'id' => 7,
				'nombre' => 'Galeria',
				'tipo'=>1				
			],
			[
				'id' => 8,
				'nombre' => 'Galeria',
				'tipo'=>2				
			],
			[
				'id' => 9,
				'nombre' => 'Video',
				'tipo'=>2				
			],

		];

		DB::table('fragmento_categorias')->insert($types);
		

		if (DB::connection()->getDriverName() == 'pgsql') {
			DB::statement("update pg_class set relhastriggers = true from pg_trigger where
                            pg_class.oid=tgrelid and relname='fragmento_categorias';");
		}
		if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}
