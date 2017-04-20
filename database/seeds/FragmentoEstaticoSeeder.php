<?php

use Illuminate\Database\Seeder;

class FragmentoEstaticoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         if (DB::connection()->getDriverName() == 'pgsql') {
			DB::statement("update pg_class set relhastriggers=false where relname = 'fragmento_estaticos';");
		}
		if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

		DB::table('fragmento_estaticos')->truncate();

		$types = [
			[
				'fragmento_id' => 1,
				'titulo'=>'facebook',
				'orden'=>1,
				'estado'=>1,
				'destacado'=>0,
			],
			[
				'fragmento_id' => 1,
				'titulo'=>'twitter',
				'orden'=>1,
				'estado'=>1,
				'destacado'=>0,
			],[
				'fragmento_id' => 1,
				'titulo'=>'googleplus',
				'orden'=>1,
				'estado'=>1,
				'destacado'=>0,
			],[
				'fragmento_id' => 1,
				'titulo'=>'pinterest',
				'orden'=>1,
				'estado'=>1,
				'destacado'=>0,
			],
			

		];

		$sliderTypes =[
			//slider
			[
				'fragmento_id' => 2,
				'titulo'=>'6to. SEMINARIO DE ACTUALIZACION DE <br>AERONAUTICAL INFORMATION SERVICE',
				'subtitulo'=>'Aerolinas',
				'resumen'=>'Del 29 de agosto  al 3 de septiembre del presente <br>año se lleva adelante el "6to Seminario de Actualización de <br>Aeroautical Information Service" ',
				'url'=>'#',
				'imagen'=>'uploads/slider1.jpg',
				'orden'=>1,
				'estado'=>1,
				'miniatura'=>'uploads/thumb/thumb1.jpg',
				'destacado'=>0,
			],
			[
				'fragmento_id' => 2,
				'titulo'=>'Trabajamos para su comodidad',
				'subtitulo'=>'Siempre asu servicio',
				'resumen'=>'Encuentre toda la información referente a<br> los vuelos de nuestros aeropuertos en tiempo real',
				'url'=>'#',
				'imagen'=>'uploads/slider2.jpg',
				'orden'=>1,
				'estado'=>1,
				'miniatura'=>'uploads/thumb/thumb2.jpg',
				'destacado'=>0,
			]
		];

		$regionales =[
			//slider
			[
				'fragmento_id' => 9,
				'titulo'=>'OFICINA CENTRAL',
				'subtitulo'=>'',
				'resumen'=>'Direccion: Calle Reyes Ortiz Esq. Federico Suazo # 74<br>
							Ubicacion: La Paz<br>
							Telefono: 2-370341<br>
							Fax: 2-370340',
				'url'=>'#',
				'orden'=>1,
				'estado'=>1,
				'destacado'=>0,
			],[
				'fragmento_id' => 9,
				'titulo'=>'REGIONAL LA PAZ',
				'subtitulo'=>'',
				'resumen'=>'Direccion: Aeropuerto Internacional El Alto (Interior) - SLLP <br>
							Ubicacion: El Alto<br>
							Telefono: 2-117723<br>
							Fax: 2-822606',
				'url'=>'#',
				'orden'=>1,
				'estado'=>1,
				'destacado'=>0,
			],[
				'fragmento_id' => 9,
				'titulo'=>'REGIONAL COCHABAMBA',
				'subtitulo'=>'',
				'resumen'=>'Direccion: Aeropuerto Internacional Jorge Wilstermann (Interior) - SLCB<br>
							Ubicacion: Cochabamba<br>
							Telefono: 4-4591553<br>
							Fax: 4-4119797',
				'url'=>'#',
				'orden'=>1,
				'estado'=>1,
				'destacado'=>0,
			],[
				'fragmento_id' => 9,
				'titulo'=>'REGIONAL SANTA CRUZ',
				'subtitulo'=>'',
				'resumen'=>'Direccion: Aeropuerto Internacional Viru Viru (Interior) - SLVR<br>
							Ubicacion: Santa Cruz<br>
							Telefono: 3-3852069<br>
							Fax: 3-3852003',
				'url'=>'#',
				'orden'=>1,
				'estado'=>1,
				'destacado'=>0,
			],[
				'fragmento_id' => 9,
				'titulo'=>'REGIONAL BENI',
				'subtitulo'=>'',
				'resumen'=>'Direccion: Aeropuerto Internacional Jorge Henrich Arauz (Interior) - SLTR<br>
							Ubicacion: Trinidad<br>
							Telefono: 3-4620388<br>
							Fax: 3-4620566',
				'url'=>'#',
				'orden'=>1,
				'estado'=>1,
				'destacado'=>0,
			],[
				'fragmento_id' => 9,
				'titulo'=>'SUBREGIONAL ORURO',
				'subtitulo'=>'',
				'resumen'=>'Direccion: Aeropuerto Juan Mendoza (Interior) - SLOR<br>
							Ubicacion: Oruro<br>
							Telefono: 2-5278333',
				'url'=>'#',
				'orden'=>1,
				'estado'=>1,
				'destacado'=>0,
			],[
				'fragmento_id' => 9,
				'titulo'=>'SUBREGIONAL COBIJA',
				'subtitulo'=>'',
				'resumen'=>'Direccion: Aeropuerto Internacional Anibal Arab Fadul (Interior) - SLCO<br>
							Ubicacion: Cobija<br>
							Telefono: 3-8422260 3-8424473 3-8423850<br>
							Fax: 3-8424478',
				'url'=>'#',
				'orden'=>1,
				'estado'=>1,
				'destacado'=>0,
			],[
				'fragmento_id' => 9,
				'titulo'=>'SUBREGIONAL UYUNI',
				'subtitulo'=>'',
				'resumen'=>'Direccion: Aeropuerto La Joya Andina (Interior) - SLUY<br>
							Ubicacion: Uyuni',
				'url'=>'#',
				'orden'=>1,
				'estado'=>1,
				'destacado'=>0,
			],
			
		];

		$typesVideo = [
			[
				'fragmento_id' => 11,
				'titulo'=>'A.A.S.A.N.A',
				'url'=>'https://www.youtube.com/watch?v=q1yaxxVF7B4',
				'resumen'=>'Administración de Aeropuertos y Servicios Auxiliares a la Navegación Aérea. www.aasana.bo',
				'orden'=>1,
				'estado'=>1,
				'destacado'=>1,
			],
		];

		$typesEnlaces = [
			[
				'fragmento_id' => 12,
				'titulo'=>'Ministerio de Obras Públicas Servicios y Viviendas',
				'url'=>'http://www.oopp.gob.bo/',
				'resumen'=>'Ministerio de Obras Públicas Servicios y Viviendas',
				'imagen'=>'uploads/obras.jpg',
				'orden'=>1,
				'estado'=>1,
				'destacado'=>0,
			],
			[
				'fragmento_id' => 12,
				'titulo'=>'Unidos Recuperemos Nuestro Mar',
				'url'=>'http://reintegracionmaritima.blogspot.com/2011/01/la-estrategia-de-evo-para-recuperar-el.html',
				'resumen'=>'Unidos Recuperemos Nuestro Mar',
				'imagen'=>'uploads/logomar.gif',
				'orden'=>2,
				'estado'=>1,
				'destacado'=>0,
			],
			[
				'fragmento_id' => 12,
				'titulo'=>'Sistema de Contrataciones Estatales',
				'url'=>'http://www.sicoes.gob.bo/',
				'resumen'=>'Sistema de Contrataciones Estatales',
				'imagen'=>'uploads/sicoes.jpg',
				'orden'=>3,
				'estado'=>1,
				'destacado'=>0,
			],
			[
				'fragmento_id' => 12,
				'titulo'=>'Trámites Bolivia',
				'url'=>'http://www.tramites.gob.bo/grupo.php?cod=11',
				'resumen'=>'Trámites Bolivia',
				'imagen'=>'uploads/logotramites.png',
				'orden'=>4,
				'estado'=>1,
				'destacado'=>0,
			],
		];

		DB::table('fragmento_estaticos')->insert($types);
		DB::table('fragmento_estaticos')->insert($sliderTypes);
		DB::table('fragmento_estaticos')->insert($regionales);
		DB::table('fragmento_estaticos')->insert($typesVideo);
		DB::table('fragmento_estaticos')->insert($typesEnlaces);
		

		if (DB::connection()->getDriverName() == 'pgsql') {
			DB::statement("update pg_class set relhastriggers = true from pg_trigger where
                            pg_class.oid=tgrelid and relname='fragmento_estaticos';");
		}
		if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}
