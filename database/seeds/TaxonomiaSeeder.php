<?php

use Illuminate\Database\Seeder;

class TaxonomiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::connection()->getDriverName() == 'pgsql') {
			DB::statement("update pg_class set relhastriggers=false where relname = 'taxonomias';");
		}
		if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

		DB::table('taxonomias')->truncate();

		$faker = Faker\Factory::create();

	    App\Models\Taxonomia\Taxonomia::create([
			    'padre_id'=>0, 
			    'nombre'=>'Noticias', 
			    'url_alias'=>null,
			    'imagen'=>null,
			    'descripcion'=>'Post de noticias',
			    'pagina_tamanio'=>1,
			    'seo_palabras_clave'=>'',
			    'seo_descripcion'=>'',
			    'contenidos'=>'',
			    'orden'=>1,
			    'categoria_id'=>'post'
	        ]);
	    

	    App\Models\Taxonomia\Taxonomia::create([
			    'padre_id'=>0, 
			    'nombre'=>'Sistema', 
			    'url_alias'=>null,
			    'imagen'=>null,
			    'descripcion'=>'Paginas de Sistema por ejemplo (quienes somos, objetivos)',
			    'pagina_tamanio'=>1,
			    'seo_palabras_clave'=>'',
			    'seo_descripcion'=>'',
			    'contenidos'=>'',
			    'orden'=>1,
			    'categoria_id'=>'page'
	        ]);
	    App\Models\Taxonomia\Taxonomia::create([
			    'padre_id'=>0, 
			    'nombre'=>'Informativas', 
			    'url_alias'=>null,
			    'imagen'=>null,
			    'descripcion'=>'Paginas Informativas Ejemplo (eventos, calendarios)',
			    'pagina_tamanio'=>1,
			    'seo_palabras_clave'=>'',
			    'seo_descripcion'=>'',
			    'contenidos'=>'',
			    'orden'=>1,
			    'categoria_id'=>'page'
	        ]);
		
		

		if (DB::connection()->getDriverName() == 'pgsql') {
			DB::statement("update pg_class set relhastriggers = true from pg_trigger where
                            pg_class.oid=tgrelid and relname='taxonomias';");
		}
		if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}
