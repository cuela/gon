<?php

use Illuminate\Database\Seeder;

class ModuloAccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::connection()->getDriverName() == 'pgsql') {
			DB::statement("update pg_class set relhastriggers=false where relname = 'modulo_accions';");
		}
		if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

		DB::table('modulo_accions')->truncate();

		$data = [
			[
				'modulo_id' => 1,
				'permiso_id' => 5,
				'usuario_id' => 2,
				'alias' => ''
			],
			[
				'modulo_id' => 1,
				'permiso_id' => 6,
				'usuario_id' => 2,
				'alias' => ''
			],
			[
				'modulo_id' => 1,
				'permiso_id' => 7,
				'usuario_id' => 2,
				'alias' => ''
			],
		];

		DB::table('modulo_accions')->insert($data);
		

		if (DB::connection()->getDriverName() == 'pgsql') {
			DB::statement("update pg_class set relhastriggers = true from pg_trigger where
                            pg_class.oid=tgrelid and relname='modulo_accions';");
		}
		if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}
