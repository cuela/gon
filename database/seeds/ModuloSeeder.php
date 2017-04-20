<?php

use Illuminate\Database\Seeder;

class ModuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::connection()->getDriverName() == 'pgsql') {
			DB::statement("update pg_class set relhastriggers=false where relname = 'modulos';");
		}
		if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

		DB::table('modulos')->truncate();

		$data = [
			[
				'nombre' => 'Gestión de Menu',
				'descripcion'=>'',
				'estado'=>1,
				'orden'=>1,
				'alias' => 'menu'
			],
			[
				'nombre' => 'Limpiar Cache',
				'descripcion'=>'',
				'estado'=>1,
				'orden'=>2,
				'alias' => 'cache'
			],
			[
				'nombre' => 'Gestión de Artículos',
				'descripcion'=>'',
				'estado'=>1,
				'orden'=>3,
				'alias' => 'articulo'
			],
			[
				'nombre' => 'Publicar Artículos',
				'descripcion'=>'',
				'estado'=>1,
				'orden'=>4,
				'alias' => 'articulo'
			],
			[
				'nombre' => 'Gestión Contenido Estático',
				'descripcion'=>'',
				'estado'=>1,
				'orden'=>5,
				'alias' => 'individual'
			],
			[
				'nombre' => 'Publicar Contenido Estático',
				'descripcion'=>'',
				'estado'=>1,
				'orden'=>6,
				'alias' => 'individual'
			],
			[
				'nombre' => 'Gestión de Convocatorias',
				'descripcion'=>'',
				'estado'=>1,
				'orden'=>7,
				'alias' => 'convocatoria'
			],
			[
				'nombre' => 'Clasificador Gestión',
				'descripcion'=>'',
				'estado'=>1,
				'orden'=>8,
				'alias' => 'clasif-gestion'
			],
			[
				'nombre' => 'Clasificador Categorías',
				'descripcion'=>'',
				'estado'=>1,
				'orden'=>9,
				'alias' => 'clasif-categoria'
			],
			[
				'nombre' => 'Artículos de Transparencia',
				'descripcion'=>'',
				'estado'=>1,
				'orden'=>10,
				'alias' => 'articulo-transparencia'
			],
			[
				'nombre' => 'Gestión de Denuncias',
				'descripcion'=>'',
				'estado'=>1,
				'orden'=>11,
				'alias' => 'denuncia'
			],
			[
				'nombre' => 'Gestión de ODECO',
				'descripcion'=>'',
				'estado'=>1,
				'orden'=>12,
				'alias' => 'odeco'
			],

			[
				'nombre' => 'Gestión Categoría AIP',
				'descripcion'=>'',
				'estado'=>1,
				'orden'=>13,
				'alias' => 'categoria-aip'
			],

			[
				'nombre' => 'Gestión Boletín AIP',
				'descripcion'=>'',
				'estado'=>1,
				'orden'=>14,
				'alias' => 'categoria-aip'
			],

			[
				'nombre' => 'Fragmento Estático',
				'descripcion'=>'',
				'estado'=>1,
				'orden'=>15,
				'alias' => 'fragmento-estatico'
			],

			[
				'nombre' => 'Fragmento de Código',
				'descripcion'=>'',
				'estado'=>1,
				'orden'=>16,
				'alias' => 'fragmento-codigo'
			],

			[
				'nombre' => 'Solicitud Boletín AIP',
				'descripcion'=>'',
				'estado'=>1,
				'orden'=>17,
				'alias' => 'solicitud-aip'
			],

			[
				'nombre' => 'Publicar Contenidos Transparencia',
				'descripcion'=>'',
				'estado'=>1,
				'orden'=>18,
				'alias' => 'public-content'
			],

			[
				'nombre' => 'Gestión Usuarios Sobrevuelos',
				'descripcion'=>'',
				'estado'=>1,
				'orden'=>19,
				'alias' => 'gestion-usuarios-sobrevuelos'
			],



			
		];

		DB::table('modulos')->insert($data);
		

		if (DB::connection()->getDriverName() == 'pgsql') {
			DB::statement("update pg_class set relhastriggers = true from pg_trigger where
                            pg_class.oid=tgrelid and relname='modulos';");
		}
		if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}
