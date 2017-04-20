<?php

use Illuminate\Database\Seeder;

class FragmentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::connection()->getDriverName() == 'pgsql') {
			DB::statement("update pg_class set relhastriggers=false where relname = 'fragmentos';");
		}
		if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

		DB::table('fragmentos')->truncate();

		$types = [
			[
				'id' => 1,
				'categoria_id' => 1,
				'nombre'=>'Red Social',
				'descripcion'=>'',
				'tipo'=>2,
				'estado'=>1,
			],
			[
				'id' => 2,
				'categoria_id' => 1,
				'nombre'=>'Banner Principal',
				'descripcion'=>'',
				'tipo'=>2,
				'estado'=>1,
			],
			[
				'id' => 3,
				'categoria_id' => 1,
				'nombre'=>'Banner Footer',
				'descripcion'=>'',
				'tipo'=>2,
				'estado'=>1,
			],
			[
				'id' => 4,
				'categoria_id' => 2,
				'nombre'=>'Enlaces',
				'descripcion'=>'',
				'tipo'=>2,
				'estado'=>1,
			],

			[
				'id' => 5,
				'categoria_id' => 6,
				'nombre'=>'Derecho de Autor',
				'descripcion'=>'',
				'tipo'=>1,
				'estado'=>1,
			],
			[
				'id' => 6,
				'categoria_id' => 5,
				'nombre'=>'Dirección de la Empresa',
				'descripcion'=>'',
				'tipo'=>1,
				'estado'=>1,
			],
			[
				'id' => 7,
				'categoria_id' => 5,
				'nombre'=>'Resumen del Sitio',
				'descripcion'=>'',
				'tipo'=>1,
				'estado'=>1,
			],
			[
				'id' => 8,
				'categoria_id' => 6,
				'nombre'=>'Información de Cabecera',
				'descripcion'=>'',
				'tipo'=>1,
				'estado'=>1,
			],
			[
				'id' => 9,
				'categoria_id' => 1,
				'nombre'=>'Direcciones Regionales',
				'descripcion'=>'',
				'tipo'=>2,
				'estado'=>1,
			],
			[
				'id' => 10,
				'categoria_id' => 8,
				'nombre'=>'Galería Principal',
				'descripcion'=>'',
				'tipo'=>2,
				'estado'=>1,
			],
			[
				'id' => 11,
				'categoria_id' => 9,
				'nombre'=>'Videos',
				'descripcion'=>'',
				'tipo'=>2,
				'estado'=>1,
			],

			[
				'id' => 12,
				'categoria_id' => 1,
				'nombre'=>'Enlace de Interés',
				'descripcion'=>'',
				'tipo'=>2,
				'estado'=>1,
			],

		];

		DB::table('fragmentos')->insert($types);
		

		if (DB::connection()->getDriverName() == 'pgsql') {
			DB::statement("update pg_class set relhastriggers = true from pg_trigger where
                            pg_class.oid=tgrelid and relname='fragmentos';");
		}
		if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}
