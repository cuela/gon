<?php

use Illuminate\Database\Seeder;

class PlantillaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::connection()->getDriverName() == 'pgsql') {
			DB::statement("update pg_class set relhastriggers=false where relname = 'plantillas';");
		}

		if (DB::connection()->getDriverName() == 'pgsql') {
            //For PostgreSQL or anything else
            DB::statement('TRUNCATE TABLE plantillas CASCADE');
        }

		$data = [
			[
                'bloque' => 'bloqueGaleria',
                'tipo' => 'fragmentos',
                'orden' => '2',
                'codigo'=> '10',
                'tabla_datos'=> 'fragmento_estaticos'
            ],
            [
                'bloque' => 'bloqueVideo',
                'tipo' => 'fragmentos',
                'orden' => '2',
                'codigo'=> '11',
                'tabla_datos'=> 'fragmento_estaticos'
            ],
		];

		DB::table('plantillas')->insert($data);

		if (DB::connection()->getDriverName() == 'pgsql') {
			DB::statement("update pg_class set relhastriggers = true from pg_trigger where
                            pg_class.oid=tgrelid and relname='plantillas';");
		}
    }
}
