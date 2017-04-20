<?php

use Illuminate\Database\Seeder;

class ConfiguracionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::connection()->getDriverName() == 'pgsql') {
			DB::statement("update pg_class set relhastriggers=false where relname = 'configuracions';");
		}

		if (DB::connection()->getDriverName() == 'pgsql') {
            //For PostgreSQL or anything else
            DB::statement('TRUNCATE TABLE configuracions CASCADE');
        }

		$types = [
			[
                'id' => 'seo_titulo',
                'valor' => ''
            ],
            [
                'id' => 'seo_descripcion',
                'valor' => ''
            ],
            [
                'id' => 'seo_palabras_clave',
                'valor' => ''
            ],
            [
                'id' => 'sitio_titulo',
                'valor' => ''
            ],
            [
                'id' => 'sitio_descripcion',
                'valor' => ''
            ],
            [
                'id' => 'sitio_email',
                'valor' => ''
            ],
            [
                'id' => 'sitio_name',
                'valor' => ''
            ],
            [
                'id' => 'sitio_url',
                'valor' => ''
            ],
            [
                'id' => 'sitio_estado',
                'valor' => ''
            ],
            [
                'id' => 'sitio_slogan',
                'valor' => 'Bienvenidos al Sitio de AASANA'
            ],
            [
                'id' => 'sitio_logo',
                'valor' => 'logo.png'
            ],
            [
                'id' => 'sitio_logo_secundario',
                'valor' => 'logo2.jpg'
            ],
            
		];

		DB::table('configuracions')->insert($types);

		if (DB::connection()->getDriverName() == 'pgsql') {
			DB::statement("update pg_class set relhastriggers = true from pg_trigger where
                            pg_class.oid=tgrelid and relname='configuracions';");
		}
    }
}
