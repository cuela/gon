<?php

use Illuminate\Database\Seeder;

class AccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::connection()->getDriverName() == 'pgsql') {
			DB::statement("update pg_class set relhastriggers=false where relname = 'accions';");
		}
		if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

		DB::table('accions')->truncate();

		$data = [
			[
				'modulo_id' => '1',
				'permiso_id'=>'5',
			],
			[
				'modulo_id' => '1',
				'permiso_id'=>'6',
			],
			[
				'modulo_id' => '1',
				'permiso_id'=>'7',
			],
			[
				'modulo_id' => '1',
				'permiso_id'=>'8',
			],
			//articulos
			[
				'modulo_id' => '3',
				'permiso_id'=>'10',
			],
			[
				'modulo_id' => '3',
				'permiso_id'=>'11',
			],
			[
				'modulo_id' => '3',
				'permiso_id'=>'12',
			],
			[
				'modulo_id' => '3',
				'permiso_id'=>'13',
			],
			[
				'modulo_id' => '3',
				'permiso_id'=>'15',
			],
			//publicar articulos
			[
				'modulo_id' => '4',
				'permiso_id'=>'14',
			],
			//contenidos estáticos
			[
				'modulo_id' => '5',
				'permiso_id'=>'16',
			],
			[
				'modulo_id' => '5',
				'permiso_id'=>'17',
			],
			[
				'modulo_id' => '5',
				'permiso_id'=>'18',
			],
			[
				'modulo_id' => '5',
				'permiso_id'=>'19',
			],
			[
				'modulo_id' => '5',
				'permiso_id'=>'20',
			],
			//publicar contenidos estáticos
			[
				'modulo_id' => '6',
				'permiso_id'=>'21',
			],
			//convocatorias
			[
				'modulo_id' => '7',
				'permiso_id'=>'22',
			],
			[
				'modulo_id' => '7',
				'permiso_id'=>'23',
			],
			[
				'modulo_id' => '7',
				'permiso_id'=>'24',
			],
			[
				'modulo_id' => '7',
				'permiso_id'=>'25',
			],
			//gestion
			[
				'modulo_id' => '8',
				'permiso_id'=>'26',
			],
			[
				'modulo_id' => '8',
				'permiso_id'=>'27',
			],
			[
				'modulo_id' => '8',
				'permiso_id'=>'28',
			],
			[
				'modulo_id' => '8',
				'permiso_id'=>'29',
			],
			//categoria
			[
				'modulo_id' => '9',
				'permiso_id'=>'30',
			],
			[
				'modulo_id' => '9',
				'permiso_id'=>'31',
			],
			[
				'modulo_id' => '9',
				'permiso_id'=>'32',
			],
			[
				'modulo_id' => '9',
				'permiso_id'=>'33',
			],
			//contenido transparencia
			[
				'modulo_id' => '10',
				'permiso_id'=>'34',
			],
			[
				'modulo_id' => '10',
				'permiso_id'=>'35',
			],
			[
				'modulo_id' => '10',
				'permiso_id'=>'36',
			],
			[
				'modulo_id' => '10',
				'permiso_id'=>'37',
			],
			//denuncia
			[
				'modulo_id' => '11',
				'permiso_id'=>'38',
			],
			[
				'modulo_id' => '11',
				'permiso_id'=>'39',
			],
			[
				'modulo_id' => '11',
				'permiso_id'=>'40',
			],
			[
				'modulo_id' => '11',
				'permiso_id'=>'41',
			],
			//odeco
			[
				'modulo_id' => '12',
				'permiso_id'=>'42',
			],
			[
				'modulo_id' => '12',
				'permiso_id'=>'43',
			],
			[
				'modulo_id' => '12',
				'permiso_id'=>'44',
			],
			[
				'modulo_id' => '12',
				'permiso_id'=>'45',
			],
			//categoria-aip
			[
				'modulo_id' => '13',
				'permiso_id'=>'46',
			],
			[
				'modulo_id' => '13',
				'permiso_id'=>'47',
			],
			[
				'modulo_id' => '13',
				'permiso_id'=>'48',
			],
			[
				'modulo_id' => '13',
				'permiso_id'=>'49',
			],

			//boletin
			[
				'modulo_id' => '14',
				'permiso_id'=>'50',
			],
			[
				'modulo_id' => '14',
				'permiso_id'=>'51',
			],
			[
				'modulo_id' => '14',
				'permiso_id'=>'52',
			],
			[
				'modulo_id' => '14',
				'permiso_id'=>'53',
			],
			[
				'modulo_id' => '17',
				'permiso_id'=>'56',
			],
			[
				'modulo_id' => '17',
				'permiso_id'=>'57',
			],
			//publicar contenido transparencia
			[
				'modulo_id' => '10',
				'permiso_id'=>'58',
			],
			//publicador contenido transparencia
			[
				'modulo_id' => '18',
				'permiso_id'=>'59',
			],
			//sobrevuelos
			[
				'modulo_id' => '19',
				'permiso_id'=>'60',
			],
			[
				'modulo_id' => '19',
				'permiso_id'=>'61',
			],
			[
				'modulo_id' => '19',
				'permiso_id'=>'62',
			],

		];

		DB::table('accions')->insert($data);
		

		if (DB::connection()->getDriverName() == 'pgsql') {
			DB::statement("update pg_class set relhastriggers = true from pg_trigger where
                            pg_class.oid=tgrelid and relname='accions';");
		}
		if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}
