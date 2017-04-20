<?php

use Illuminate\Database\Seeder;

class ModuloRolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::connection()->getDriverName() == 'pgsql') {
			DB::statement("update pg_class set relhastriggers=false where relname = 'modulo_rols';");
		}
		if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

		DB::table('modulo_rols')->truncate();

		$data = [
			[
				'modulo_id' => 1,
				'rol_id' => 2
			],
			[
				'modulo_id' => 2,
				'rol_id' => 2
			],
			[
				'modulo_id' => 3,
				'rol_id' => 4
			],
			[
				'modulo_id' => 4,
				'rol_id' => 5
			],
			[
				'modulo_id' => 5,
				'rol_id' => 4
			],
			[
				'modulo_id' => 6,
				'rol_id' => 6
			],
			[
				'modulo_id' => 7,
				'rol_id' => 7
			],
			[
				'modulo_id' => 8,
				'rol_id' => 8
			],
			[
				'modulo_id' => 9,
				'rol_id' => 8
			],
			[
				'modulo_id' => 10,
				'rol_id' => 8
			],
			[
				'modulo_id' => 11,
				'rol_id' => 8
			],
			[
				'modulo_id' => 12,
				'rol_id' => 8
			],
			[
				'modulo_id' => 13,
				'rol_id' => 9
			],
			[
				'modulo_id' => 14,
				'rol_id' => 9
			],
			[
				'modulo_id' => 15,
				'rol_id' => 2
			],
			[
				'modulo_id' => 16,
				'rol_id' => 2
			],
			[
				'modulo_id' => 17,
				'rol_id' => 9
			],
			[
				'modulo_id' => 18,
				'rol_id' => 10
			],
			[
				'modulo_id' => 19,
				'rol_id' => 11
			],
			
		];

		DB::table('modulo_rols')->insert($data);
		

		if (DB::connection()->getDriverName() == 'pgsql') {
			DB::statement("update pg_class set relhastriggers = true from pg_trigger where
                            pg_class.oid=tgrelid and relname='modulo_rols';");
		}
		if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}
