<?php

use Illuminate\Database\Seeder;

class ClasificadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::connection()->getDriverName() == 'pgsql') {
			DB::statement("update pg_class set relhastriggers=false where relname = 'clasificadors';");
		}

		if (DB::connection()->getDriverName() == 'pgsql') {
            //For PostgreSQL or anything else
            DB::statement('TRUNCATE TABLE clasificadors CASCADE');
        }

		$data = [
			[
                'nombre' => 'Boletines AIP',
                'descripcion' => '',
                'estado' => '1',
                'orden'=> '1',
                'grupo'=> 'tipo_usuario'
            ],
            [
                'nombre' => 'Sobrevuelos',
                'descripcion' => '',
                'estado' => '1',
                'orden'=> '2',
                'grupo'=> 'tipo_usuario'
            ],
            [
                'nombre' => 'Otros',
                'descripcion' => '',
                'estado' => '1',
                'orden'=> '3',
                'grupo'=> 'tipo_usuario'
            ],
		];

		DB::table('clasificadors')->insert($data);

		if (DB::connection()->getDriverName() == 'pgsql') {
			DB::statement("update pg_class set relhastriggers = true from pg_trigger where
                            pg_class.oid=tgrelid and relname='clasificadors';");
		}
    }
}
