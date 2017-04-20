<?php

use Illuminate\Database\Seeder;

class MenuDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::connection()->getDriverName() == 'pgsql') {
			DB::statement("update pg_class set relhastriggers=false where relname = 'menus';");
		}
		if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

		DB::table('menus')->truncate();

		$types = [
			[
				'padre_id' => 0,
				'menu_categoria_id'=>'main',
				'nombre'=>'Institución',
				'url'=>'#',
				'destino'=>'_self',
				'descripcion'=>'',
				'imagen'=>'',
				'estado'=>1,
				'orden'=>1
			],
			[
				'padre_id' => 1,
				'menu_categoria_id'=>'main',
				'nombre'=>'Misión Visión',
				'url'=>'/pagina/2',
				'destino'=>'_self',
				'descripcion'=>'',
				'imagen'=>'',
				'estado'=>1,
				'orden'=>1
			],
			[
				'padre_id' => 1,
				'menu_categoria_id'=>'main',
				'nombre'=>'Información General',
				'url'=>'/pagina/1',
				'destino'=>'_self',
				'descripcion'=>'',
				'imagen'=>'',
				'estado'=>1,
				'orden'=>1
			],
			[
				'padre_id' => 1,
				'menu_categoria_id'=>'main',
				'nombre'=>'Nuestras Autoridades',
				'url'=>'/pagina/1',
				'destino'=>'_self',
				'descripcion'=>'',
				'imagen'=>'',
				'estado'=>1,
				'orden'=>1
			],
			
			[
				'padre_id' => 0,
				'menu_categoria_id'=>'main',
				'nombre'=>'Comunicaciones',
				'url'=>'#',
				'destino'=>'_self',
				'descripcion'=>'',
				'imagen'=>'',
				'estado'=>1,
				'orden'=>1
			],
			[
				'padre_id' => 5,
				'menu_categoria_id'=>'main',
				'nombre'=>'Noticias',
				'url'=>'/postsCategoria/1',
				'destino'=>'_self',
				'descripcion'=>'',
				'imagen'=>'',
				'estado'=>1,
				'orden'=>1
			],
			[
				'padre_id' => 5,
				'menu_categoria_id'=>'main',
				'nombre'=>'Comunicados',
				'url'=>'/postsCategoria/3',
				'destino'=>'_self',
				'descripcion'=>'',
				'imagen'=>'',
				'estado'=>1,
				'orden'=>1
			],
			[
				'padre_id' => 5,
				'menu_categoria_id'=>'main',
				'nombre'=>'Circulares',
				'url'=>'/postsCategoria/2',
				'destino'=>'_self',
				'descripcion'=>'',
				'imagen'=>'',
				'estado'=>1,
				'orden'=>1
			],
			[
				'padre_id' => 0,
				'menu_categoria_id'=>'main',
				'nombre'=>'Información Aeronáutica',
				'url'=>'#',
				'destino'=>'_self',
				'descripcion'=>'',
				'imagen'=>'',
				'estado'=>1,
				'orden'=>1
			],
			[
				'padre_id' => 9,
				'menu_categoria_id'=>'main',
				'nombre'=>'Comercial',
				'url'=>'/pagina/1',
				'destino'=>'_self',
				'descripcion'=>'',
				'imagen'=>'',
				'estado'=>1,
				'orden'=>1
			],
			[
				'padre_id' => 9,
				'menu_categoria_id'=>'main',
				'nombre'=>'Información Técnica',
				'url'=>'/pagina/1',
				'destino'=>'_self',
				'descripcion'=>'',
				'imagen'=>'',
				'estado'=>1,
				'orden'=>1
			],
			[
				'padre_id' => 9,
				'menu_categoria_id'=>'main',
				'nombre'=>'Información Metereológica',
				'url'=>'/pagina/1',
				'destino'=>'_self',
				'descripcion'=>'',
				'imagen'=>'',
				'estado'=>1,
				'orden'=>1
			],
			[
				'padre_id' => 9,
				'menu_categoria_id'=>'main',
				'nombre'=>'AIP',
				'url'=>'/boletin',
				'destino'=>'_self',
				'descripcion'=>'',
				'imagen'=>'',
				'estado'=>1,
				'orden'=>1
			],
			[
				'padre_id' => 9,
				'menu_categoria_id'=>'main',
				'nombre'=>'Control de Mando Estadístico',
				'url'=>'/pagina/1',
				'destino'=>'_self',
				'descripcion'=>'',
				'imagen'=>'',
				'estado'=>1,
				'orden'=>1
			],[
				'padre_id' => 0,
				'menu_categoria_id'=>'main',
				'nombre'=>'Transparencia',
				'url'=>'#',
				'destino'=>'_self',
				'descripcion'=>'',
				'imagen'=>'',
				'estado'=>1,
				'orden'=>1
			],[
				'padre_id' => 15,
				'menu_categoria_id'=>'main',
				'nombre'=>'Gestiones',
				'url'=>'/transparencia',
				'destino'=>'_self',
				'descripcion'=>'',
				'imagen'=>'',
				'estado'=>1,
				'orden'=>1
			],
			[
				'padre_id' => 15,
				'menu_categoria_id'=>'main',
				'nombre'=>'Denuncias',
				'url'=>'/denuncia/crear',
				'destino'=>'_self',
				'descripcion'=>'',
				'imagen'=>'',
				'estado'=>1,
				'orden'=>1
			],
			[
				'padre_id' => 15,
				'menu_categoria_id'=>'main',
				'nombre'=>'Convocatorias',
				'url'=>'/convocatoria',
				'destino'=>'_self',
				'descripcion'=>'',
				'imagen'=>'',
				'estado'=>1,
				'orden'=>1
			],
			[
				'padre_id' => 15,
				'menu_categoria_id'=>'main',
				'nombre'=>'ODECO',
				'url'=>'/odeco/crear',
				'destino'=>'_self',
				'descripcion'=>'',
				'imagen'=>'',
				'estado'=>1,
				'orden'=>1
			],
			[
				'padre_id' => 0,
				'menu_categoria_id'=>'main',
				'nombre'=>'Contáctos',
				'url'=>'#',
				'destino'=>'_self',
				'descripcion'=>'',
				'imagen'=>'',
				'estado'=>1,
				'orden'=>1
			],
			[
				'padre_id' => 20,
				'menu_categoria_id'=>'main',
				'nombre'=>'Contactos Institucionales',
				'url'=>'/pagina/1',
				'destino'=>'_self',
				'descripcion'=>'',
				'imagen'=>'',
				'estado'=>1,
				'orden'=>1
			],
			[
				'padre_id' => 20,
				'menu_categoria_id'=>'main',
				'nombre'=>'Guía REDCA',
				'url'=>'/pagina/1',
				'destino'=>'_self',
				'descripcion'=>'',
				'imagen'=>'',
				'estado'=>1,
				'orden'=>1
			],
			[
				'padre_id' => 20,
				'menu_categoria_id'=>'main',
				'nombre'=>'Regionales',
				'url'=>'/pagina/1',
				'destino'=>'_self',
				'descripcion'=>'',
				'imagen'=>'',
				'estado'=>1,
				'orden'=>1
			],
			[
				'padre_id' => 20,
				'menu_categoria_id'=>'main',
				'nombre'=>'Enlaces de Interés',
				'url'=>'/fragmentoEstatico/12',
				'destino'=>'_self',
				'descripcion'=>'',
				'imagen'=>'',
				'estado'=>1,
				'orden'=>1
			],
			//Menu footer
			[
				'padre_id' => 0,
				'menu_categoria_id'=>'footer',
				'nombre'=>'Quienes Somos',
				'url'=>'/pagina/1',
				'destino'=>'_self',
				'descripcion'=>'',
				'imagen'=>'',
				'estado'=>1,
				'orden'=>1
			],
			[
				'padre_id' => 0,
				'menu_categoria_id'=>'footer',
				'nombre'=>'Meteorología',
				'url'=>'/pagina/1',
				'destino'=>'_self',
				'descripcion'=>'',
				'imagen'=>'',
				'estado'=>1,
				'orden'=>1
			],
			[
				'padre_id' => 0,
				'menu_categoria_id'=>'footer',
				'nombre'=>'Rutas Aéreas',
				'url'=>'/pagina/1',
				'destino'=>'_self',
				'descripcion'=>'',
				'imagen'=>'',
				'estado'=>1,
				'orden'=>1
			],
			[
				'padre_id' => 0,
				'menu_categoria_id'=>'footer',
				'nombre'=>' Mapa del Sitio',
				'url'=>'/pagina/1',
				'destino'=>'_self',
				'descripcion'=>'',
				'imagen'=>'',
				'estado'=>1,
				'orden'=>1
			],
			[
				'padre_id' => 0,
				'menu_categoria_id'=>'footer',
				'nombre'=>' Contactos',
				'url'=>'/pagina/1',
				'destino'=>'_self',
				'descripcion'=>'',
				'imagen'=>'',
				'estado'=>1,
				'orden'=>1
			]

		];

		DB::table('menus')->insert($types);
		

		if (DB::connection()->getDriverName() == 'pgsql') {
			DB::statement("update pg_class set relhastriggers = true from pg_trigger where
                            pg_class.oid=tgrelid and relname='menus';");
		}
		if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}
