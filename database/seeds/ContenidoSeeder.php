<?php

use Illuminate\Database\Seeder;

class ContenidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::connection()->getDriverName() == 'pgsql') {
			DB::statement("update pg_class set relhastriggers=false where relname = 'contenidos';");
		}
		if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

		DB::table('contenidos')->truncate();

		App\Models\Contenido\Contenido::create([
	           'taxonomia_id'=>2,
	           'usuario_id'=>1,
	           'categoria_id'=>'page',
	           'titulo'=>'Página en construcción', 
	           'subtitulo'=>'Nuestra Visión Misión', 
	           'url_alias'=>'', 
	           'redireccionar_url'=>'',
	           'resumen'=>'Contenido en construcción',
	           'imagen'=>'', 
	           'cuerpo'=>'Estamos trabajando la página', 
	           'permitir_comentario'=>0,
	           'visibilidad'=>2,
                'estado'=>3,
	           'titular'=>0,
	           
	        ]);

        App\Models\Contenido\Contenido::create([
               'taxonomia_id'=>2,
               'usuario_id'=>1,
               'categoria_id'=>'page',
               'titulo'=>'Quienes Somos', 
               'subtitulo'=>'Nuestra Visión Misión', 
               'url_alias'=>'', 
               'redireccionar_url'=>'',
               'resumen'=>'Prestación de servicios de control y protección a la navegación aérea en todo el espacio aéreo nacional, así como la administración de aeropuertos, bajo conceptos y normas de calidad que garanticen la seguridad área contribuyendo al desarrollo e integración del país.',
               'imagen'=>'', 
               'cuerpo'=>'<div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 ">
        <div class="row">
          <div class="col-md-6 col-xs-12 text-left">
            <h2 class="light-font">BIOGRAFIA</h2>
            <hr class=" separator_10">
            <div class="media no-margin"> 
            <img src="media/slider/1.jpg"  alt="img" class="responsive-img"></div>
            <p>&nbsp; </p>
            <p>Nació: 30-09-1956</p>
            <p>
            Profesión: Militar</p>
            <p>
            El General Tito Roger Gandarillas Salazar nació en el sector minero de Unutuluni, en la provincia paceña de Tipuani. Es hijo de Manuel Gandarillas y Corina Salazar. Desde joven soñó con ser piloto militar inspirado en los vuelos de las aeronaves C47, que eran usadas por las líneas aéreas que surcaban esa región, por el auge del oro.
            </p>
            <p>
            En 1974, egreso como bachiller del colegio Franciscano de la Tercera Orden de la ciudad La Paz.
            </p>
            <p>
            En 1978, egreso con el grado de subteniente del Colegio Militar de Aviación.
            </p>
            <p>
            Los méritos a lo largo de su carrera, le permitieron asumir cargos altos en la Fuerza Aérea Boliviana.</p>
          </div>
          <div class="col-md-6 col-xs-12 text-left">
            <h2 class="light-font">MISIÓN</h2>
            <p class="text-left after-heading-info " > Prestación de servicios de control y protección a la navegación aérea en todo el espacio aéreo nacional, así como la administración de aeropuertos, bajo conceptos y normas de calidad que garanticen la seguridad área contribuyendo al desarrollo e integración del país.</p>
            <hr class=" separator_10">
            <h2 class="light-font">VISIÓN</h2>
            <p class="text-left after-heading-info " > Organización pública moderna, con gestión técnica de excelencia y calidad, que presta servicios con sistemas y equipos de tecnología satelital acorde a los planes CNS/ATM de la OACI.</p>
            <hr class=" separator_10">
            <h2 class="light-font">PRINCIPIOS Y VALORES INSTITUCIONALES</h2>
            <ul class="category-list unstyled clearfix">
              <li><i class="fa fa-long-arrow-right"></i>Otorgar la más alta prioridad a la seguridad en la provisión de los servicios de navegación aérea, por encima de cualquier económico o social.</li>
              <li><i class="fa fa-long-arrow-right"></i>Alcanzar y mantener el sistema de navegación aérea.</li>
              <li><i class="fa fa-long-arrow-right"></i>Asegurar un enfoque formalizado, explícito y proactivo de gestión sistemática de la seguridad.</li>
              <li><i class="fa fa-long-arrow-right"></i>Ética como un compromiso efectivo del servidor y servidora pública con valores y principios establecidos en la CPE, que lo conducen a un correcto desempeño personal y laboral.</li>
              <li><i class="fa fa-long-arrow-right"></i>Legalidad en las acciones dentro del marco de las disposiciones legales vigentes en el país que responden a la voluntad soberana del pueblo. </li>
              <li><i class="fa fa-long-arrow-right"></i>Igualdad en el pleno derecho de ejercer la función, sin ningún tipo de discriminación, otorgando un trato equitativo sin distinción de ninguna naturaleza a toda la población.</li>
              <li><i class="fa fa-long-arrow-right"></i>Transparencia en la práctica y manejo visible de los recursos del Estado, por parte de los servidores públicos y de personas naturales y jurídicas, nacionales y extranjeras que presten servicios o comprometan recursos del Estado, así como la honestidad e idoneidad en los actos públicos.</li>
              <li><i class="fa fa-long-arrow-right"></i>Eficiencia en el cumplimiento de los objetivos y de las metas trazadas optimizando los recursos disponibles oportunamente.</li>
              <li><i class="fa fa-long-arrow-right"></i>Eficacia al alcanzar  los resultados programados orientados a lograr impactos en la sociedad.</li>
              <li><i class="fa fa-long-arrow-right"></i>Calidad en el desempeño laboral orientado a la prestación de servicios de administración y de navegación aérea</li>
              
            </ul>
          </div>
        </div>
      </div>
    </div>', 
               'permitir_comentario'=>0,
               'visibilidad'=>2,
             'estado'=>3,
               'titular'=>0,
               
            ]);

App\Models\Contenido\Contenido::create([
             'taxonomia_id'=>1,
             'usuario_id'=>1,
             'categoria_id'=>'post',
             'titulo'=>'REUNIÓN ELABORACIÓN PROYECTOS DE INVERSIÓN Y POA 2017', 
             'subtitulo'=>'El equipo de trabajo de la AASANA', 
             'url_alias'=>'', 
             'redireccionar_url'=>'',
             'resumen'=>'El equípo de la AASANA se reunió para coordinar la elaboración de Proyectos de Inversión y la preparación del POA  para la gestión 2017',
             'imagen'=>'uploads/noticia_destacada.jpg', 
             'cuerpo'=>'El equípo de la AASANA se reunió para coordinar la elaboración de Proyectos de Inversión y la preparación del POA  para la gestión 2017', 
             'permitir_comentario'=>0,
             'visibilidad'=>2,
             'estado'=>3,
             'titular'=>1,
             
          ]);
App\Models\Contenido\Contenido::create([
             'taxonomia_id'=>1,
             'usuario_id'=>1,
             'categoria_id'=>'post',
             'titulo'=>'REUNIÓN REGLAMENTOS INTERNOS', 
             'subtitulo'=>'El equipo de trabajo de la AASANA', 
             'url_alias'=>'', 
             'redireccionar_url'=>'',
             'resumen'=>'Reunión Director Nacional de AASANA con la Federación Nacional de Trabajadores de AASANA-FENTA, a objeto de llevar adelante la elaboración de Reglamentos Internos para fortalecer la institución',
             'imagen'=>'uploads/noticia1.jpg', 
             'cuerpo'=>'Reunión Director Nacional de AASANA con la Federación Nacional de Trabajadores de AASANA-FENTA, a objeto de llevar adelante la elaboración de Reglamentos Internos para fortalecer la institución', 
             'permitir_comentario'=>0,
             'visibilidad'=>2,
             'estado'=>3,
             'titular'=>0,
          ]);
App\Models\Contenido\Contenido::create([
             'taxonomia_id'=>1,
             'usuario_id'=>1,
             'categoria_id'=>'post',
             'titulo'=>'REUNIÓN DE COORDINACIÓN', 
             'subtitulo'=>'El equipo de trabajo de la AASANA', 
             'url_alias'=>'', 
             'redireccionar_url'=>'',
             'resumen'=>'Reunión de coordinación entre el Director Ejecutivo Nacional, Director Regional de SantaCruz, Federación Nacional de Trabajadores de AASANA -FENTA y Asesores.',
             'imagen'=>'uploads/noticia2.jpg', 
             'cuerpo'=>'Reunión de coordinación entre el Director Ejecutivo Nacional, Director Regional de SantaCruz, Federación Nacional de Trabajadores de AASANA -FENTA y Asesores.', 
             'permitir_comentario'=>0,
             'visibilidad'=>2,
             'estado'=>3,
             'titular'=>0,
          ]);

/*
		$faker = Faker\Factory::create();
		$taxonomia = App\Models\Taxonomia\Taxonomia::where('categoria_id','post')->pluck('id')->All();
		$categoria = 'post';

	    for($i = 0; $i < 300; $i++) {
	        App\Models\Contenido\Contenido::create([
	           'taxonomia_id'=>$faker->randomElement($taxonomia),
	           'usuario_id'=>1,
	           'categoria_id'=>$categoria,
	           'titulo'=>$faker->title, 
	           'subtitulo'=>$faker->title, 
	           'url_alias'=>'', 
	           'redireccionar_url'=>$faker->url,
	           'resumen'=>$faker->text,
	           'imagen'=>$faker->imageUrl(550, 460), 
	           'cuerpo'=>$faker->text, 
	           'permitir_comentario'=>1,
	           'visibilidad'=>1,
	           'estado'=>1,
	           
	        ]);
	    }

*/

		if (DB::connection()->getDriverName() == 'pgsql') {
			DB::statement("update pg_class set relhastriggers = true from pg_trigger where
                            pg_class.oid=tgrelid and relname='contenidos';");
		}
		if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}
