<?php

use Illuminate\Database\Seeder;

class FragmentoCodigo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::connection()->getDriverName() == 'pgsql') {
			DB::statement("update pg_class set relhastriggers=false where relname = 'fragmento_codigos';");
		}
		if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

		DB::table('fragmento_codigos')->truncate();

		$types = [
			[
				'fragmento_id' => 5,
				'titulo'=>'copyright',
				'contenido'=>' Copyright © AASANA 2016. Todos los Derechos Reservados. ',
				'orden'=>1,
				'estado'=>1,
			],[
				'fragmento_id' => 8,
				'titulo'=>'Información de Cabecera',
				'contenido'=>'<div class="col-right-header">
					              <img src="/img/frontend/logo1.png">
					            </div>
					            <div class="col-right-header">
					              <img src="/img/frontend/logo2.png">
					            </div>',
				'orden'=>1,
				'estado'=>1,
			],[
				'fragmento_id' => 7,
				'titulo'=>'Resumen del sitio (footer)',
				'contenido'=>'Prestación de servicios de control y protección a la navegación aérea en todo el espacio aéreo nacional, así como la administración de aeropuertos, bajo conceptos y normas de calidad que garanticen la seguridad área contribuyendo al desarrollo e integración del país.',
				'orden'=>1,
				'estado'=>1,
			],[
				'fragmento_id' => 6,
				'titulo'=>'Dirección de la Empresa (footer)',
				'contenido'=>'<table>
                  <tr>
                    <td><i class="fa fa-map-marker"></i></td>
                    <td>380 Canal View Society, River Street
                      Victoria ML 00789</td>
                  </tr>
                  <tr>
                    <td><i class="fa fa-phone"></i></td>
                    <td>0800.123.9876</td>
                  </tr>
                  <tr>
                    <td><i class="fa fa-envelope"></i></td>
                    <td><a href="mailto:contact.us@domain.com">contact.us@domain.com</a></td>
                  </tr>
                  <tr>
                    <td><i class="fa fa-fax"></i></td>
                    <td>123.456.0000</td>
                  </tr>
                  <tr>
                    <td><i class="fa fa-clock-o"></i></td>
                    <td>Mon - Sat : 0900 - 1900<br>
                      Sun : Closed</td>
                  </tr>
                </table>',
				'orden'=>1,
				'estado'=>1,
			],

		];

		DB::table('fragmento_codigos')->insert($types);
		

		if (DB::connection()->getDriverName() == 'pgsql') {
			DB::statement("update pg_class set relhastriggers = true from pg_trigger where
                            pg_class.oid=tgrelid and relname='fragmento_codigos';");
		}
		if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}
