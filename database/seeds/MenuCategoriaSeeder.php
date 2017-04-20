<?php

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::connection()->getDriverName() == 'pgsql') {
			DB::statement("update pg_class set relhastriggers=false where relname = 'menu_categorias';");
		}

		if (DB::connection()->getDriverName() == 'pgsql') {
            //For PostgreSQL or anything else
            DB::statement('TRUNCATE TABLE menu_categorias CASCADE');
        }

		$types = [
			[
                'id' => 'footer',
                'nombre' => ' Pie de Página',
                'descripcion' => ''
            ],
            [
                'id' => 'main',
                'nombre' => ' Menú principal',
                'descripcion' => ''
            ],
		];

		DB::table('menu_categorias')->insert($types);

		if (DB::connection()->getDriverName() == 'pgsql') {
			DB::statement("update pg_class set relhastriggers = true from pg_trigger where
                            pg_class.oid=tgrelid and relname='menu_categorias';");
		}

    }
}

