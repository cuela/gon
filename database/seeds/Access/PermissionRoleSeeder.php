<?php

use Illuminate\Database\Seeder;
use App\Models\Access\Role\Role;
use Illuminate\Support\Facades\DB;

/**
 * Class PermissionRoleSeeder
 */
class PermissionRoleSeeder extends Seeder
{
	/**
	 * Run the database seed.
	 *
	 * @return void
	 */
	public function run()
	{
		if (DB::connection()->getDriverName() == 'mysql') {
			DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		}

		if (DB::connection()->getDriverName() == 'mysql') {
			DB::table(config('access.permission_role_table'))->truncate();
		} elseif (DB::connection()->getDriverName() == 'sqlite') {
			DB::statement('DELETE FROM ' . config('access.permission_role_table'));
		} else {
			//For PostgreSQL or anything else
			DB::statement('TRUNCATE TABLE ' . config('access.permission_role_table') . ' CASCADE');
		}

		/**
		 * Assign view backend and manage user permissions to executive role as example
		 */
		Role::find(2)->permissions()->sync([1]);

		Role::find(4)->permissions()->sync([1]);

		Role::find(5)->permissions()->sync([1]);

		//Role::find(2)->permissions()->sync([1, 2]);
		//editores
		//DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [4, 4]);
		//DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [1, 4]);

		//menu
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [5, 2]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [6, 2]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [7, 2]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [7, 2]);

		//gestion de cache
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [9, 2]);

		//gestión de artículos
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [10, 4]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [11, 4]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [12, 4]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [13, 4]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [15, 4]);

		//publicar articulo
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [14, 5]);



		//contenido estatico
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [16, 4]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [17, 4]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [18, 4]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [19, 4]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [20, 4]);

		//publicar contenido estatico
		Role::find(6)->permissions()->sync([1]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [21, 6]);

		//convocatoria
		Role::find(7)->permissions()->sync([1]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [22, 7]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [23, 7]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [24, 7]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [25, 7]);

		//transparencia
		Role::find(8)->permissions()->sync([1]);
		//clasif. gestión
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [26, 8]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [27, 8]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [28, 8]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [29, 8]);
		//clasif. categoria
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [30, 8]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [31, 8]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [32, 8]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [33, 8]);
		//contenido transparencia
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [34, 8]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [35, 8]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [36, 8]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [37, 8]);
		//denuncia
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [38, 8]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [39, 8]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [40, 8]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [41, 8]);
		//odeco
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [42, 8]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [43, 8]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [44, 8]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [45, 8]);

		Role::find(9)->permissions()->sync([1]);
		//categoría Boletín
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [46, 9]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [47, 9]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [48, 9]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [49, 9]);

		//Boletín
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [50, 9]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [51, 9]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [52, 9]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [53, 9]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [56, 9]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [57, 9]);

		//fragmento
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [54, 2]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [55, 2]);

		//publicar contenido transparencia
		Role::find(10)->permissions()->sync([1]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [58, 8]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [59, 10]);

		//sobrevuelos
		Role::find(11)->permissions()->sync([1]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [60, 11]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [61, 11]);
		DB::insert('insert into permission_role (permission_id, role_id) values (?, ?)', [62, 11]);
		/**
		 * 
		 */

		if (DB::connection()->getDriverName() == 'mysql') {
			DB::statement('SET FOREIGN_KEY_CHECKS=1;');
		}
	}
}