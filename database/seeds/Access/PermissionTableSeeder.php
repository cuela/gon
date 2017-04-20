<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class PermissionTableSeeder
 */
class PermissionTableSeeder extends Seeder
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
            DB::table(config('access.permissions_table'))->truncate();
            DB::table(config('access.permission_role_table'))->truncate();
        } elseif (DB::connection()->getDriverName() == 'sqlite') {
            DB::statement('DELETE FROM ' . config('access.permissions_table'));
            DB::statement('DELETE FROM ' . config('access.permission_role_table'));
        } else {
            //For PostgreSQL or anything else
            DB::statement('TRUNCATE TABLE ' . config('access.permissions_table') . ' CASCADE');
            DB::statement('TRUNCATE TABLE ' . config('access.permission_role_table') . ' CASCADE');
        }

        /**
         * Don't need to assign any permissions to administrator because the all flag is set to true
         * in RoleTableSeeder.php
         */

        /**
         * Misc Access Permissions
         */
        $permission_model          = config('access.permission');
        $viewBackend               = new $permission_model;
        $viewBackend->name         = 'view-backend';
        $viewBackend->display_name = 'Acceso al Administrador';
        $viewBackend->sort         = 1;
        $viewBackend->created_at   = Carbon::now();
        $viewBackend->updated_at   = Carbon::now();
        $viewBackend->type         = 'N';
        $viewBackend->save();

        /**
         * Access Permissions
         */
        $permission_model          = config('access.permission');
        $manageUsers               = new $permission_model;
        $manageUsers->name         = 'manage-users';
        $manageUsers->display_name = 'Gestión de Usuarios';
        $manageUsers->sort         = 2;
        $manageUsers->created_at   = Carbon::now();
        $manageUsers->updated_at   = Carbon::now();
        $manageUsers->type         = 'N';
        $manageUsers->save();

        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'manage-roles';
        $manageRoles->display_name = 'Gestión de Roles';
        $manageRoles->sort         = 3;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'N';
        $manageRoles->save();

        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'gestion-contenido';
        $manageRoles->display_name = 'Gestión de Contenidos';
        $manageRoles->sort         = 4;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'N';
        $manageRoles->save();

        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'ver-menu';
        $manageRoles->display_name = 'Ver Menú';
        $manageRoles->sort         = 5;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();

        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'crear-menu';
        $manageRoles->display_name = 'Crear Menú';
        $manageRoles->sort         = 6;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();

        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'editar-menu';
        $manageRoles->display_name = 'Editar Menú';
        $manageRoles->sort         = 7;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();

        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'eliminar-menu';
        $manageRoles->display_name = 'Eliminar Menú';
        $manageRoles->sort         = 8;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();

        //gestion de cache
        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'gestion-cache';
        $manageRoles->display_name = 'Gestión de Cache';
        $manageRoles->sort         = 9;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'N';
        $manageRoles->save();


        //gestion de artículos
        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'ver-articulo';
        $manageRoles->display_name = 'Ver artículos';
        $manageRoles->sort         = 10;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();


        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'crear-articulo';
        $manageRoles->display_name = 'Crear artículos';
        $manageRoles->sort         = 11;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();


        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'editar-articulo';
        $manageRoles->display_name = 'Editar Artículos';
        $manageRoles->sort         = 12;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();

        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'eliminar-articulo';
        $manageRoles->display_name = 'Eliminar Artículos';
        $manageRoles->sort         = 13;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();

        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'ver-publicar-articulo';
        $manageRoles->display_name = 'Publicar Artículo';
        $manageRoles->sort         = 14;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();

        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'publicar-articulo';
        $manageRoles->display_name = 'Publicar Artículo';
        $manageRoles->sort         = 15;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();

        //contenido estatico
        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'ver-individual';
        $manageRoles->display_name = 'Ver Contenido Estático';
        $manageRoles->sort         = 16;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();


        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'crear-individual';
        $manageRoles->display_name = 'Crear Contenido Estático';
        $manageRoles->sort         = 17;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();


        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'editar-individual';
        $manageRoles->display_name = 'Editar Contenido Estático';
        $manageRoles->sort         = 18;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();

        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'eliminar-individual';
        $manageRoles->display_name = 'Eliminar Contenido Estático';
        $manageRoles->sort         = 19;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();

        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'ver-publicar-individual';
        $manageRoles->display_name = 'Publicar Contenido Estático';
        $manageRoles->sort         = 20;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();

        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'publicar-individual';
        $manageRoles->display_name = 'Publicar Contenido Estático';
        $manageRoles->sort         = 21;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();


        //convocatoria
        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'ver-convocatoria';
        $manageRoles->display_name = 'Ver Convocatoria';
        $manageRoles->sort         = 22;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();


        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'crear-convocatoria';
        $manageRoles->display_name = 'Crear Convocatoria';
        $manageRoles->sort         = 23;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();


        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'editar-convocatoria';
        $manageRoles->display_name = 'Editar Convocatoria';
        $manageRoles->sort         = 24;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();

        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'eliminar-convocatoria';
        $manageRoles->display_name = 'Eliminar Convocatoria';
        $manageRoles->sort         = 25;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();


        //clasificador gestion
        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'ver-clasif-gestion';
        $manageRoles->display_name = 'Ver Clasif. Gestión';
        $manageRoles->sort         = 26;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();


        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'crear-clasif-gestion';
        $manageRoles->display_name = 'Crear Clasif. Gestión';
        $manageRoles->sort         = 27;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();


        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'editar-clasif-gestion';
        $manageRoles->display_name = 'Editar Clasif. Gestión';
        $manageRoles->sort         = 28;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();

        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'eliminar-clasif-gestion';
        $manageRoles->display_name = 'Eliminar Clasif. Gestión';
        $manageRoles->sort         = 29;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();

        //clasificador categoria
        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'ver-clasif-categoria';
        $manageRoles->display_name = 'Ver Clasif. Categoría';
        $manageRoles->sort         = 30;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();


        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'crear-clasif-categoria';
        $manageRoles->display_name = 'Crear Clasif. Categoría';
        $manageRoles->sort         = 31;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();


        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'editar-clasif-categoria';
        $manageRoles->display_name = 'Editar Clasif. Categoría';
        $manageRoles->sort         = 32;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();

        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'eliminar-clasif-categoria';
        $manageRoles->display_name = 'Eliminar Clasif. Categoría';
        $manageRoles->sort         = 33;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();

        //Contenido de transparencia
        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'ver-contenido-transparencia';
        $manageRoles->display_name = 'Ver Contenido de Transparencia';
        $manageRoles->sort         = 34;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();


        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'crear-contenido-transparencia';
        $manageRoles->display_name = 'Crear Contenido de Transparencia';
        $manageRoles->sort         = 35;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();


        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'editar-contenido-transparencia';
        $manageRoles->display_name = 'Editar Contenido de Transparencia';
        $manageRoles->sort         = 36;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();

        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'eliminar-contenido-transparencia';
        $manageRoles->display_name = 'Eliminar Contenido de Transparencia';
        $manageRoles->sort         = 37;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();

        //Denuncia
        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'ver-denuncia';
        $manageRoles->display_name = 'Ver Denuncia';
        $manageRoles->sort         = 38;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();


        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'crear-denuncia';
        $manageRoles->display_name = 'Crear Denuncia';
        $manageRoles->sort         = 39;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();


        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'editar-denuncia';
        $manageRoles->display_name = 'Editar Denuncia';
        $manageRoles->sort         = 40;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();

        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'eliminar-denuncia';
        $manageRoles->display_name = 'Eliminar Denuncia';
        $manageRoles->sort         = 41;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();

        //Odeco
        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'ver-odeco';
        $manageRoles->display_name = 'Ver Odeco';
        $manageRoles->sort         = 42;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();


        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'crear-odeco';
        $manageRoles->display_name = 'Crear Odeco';
        $manageRoles->sort         = 43;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();


        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'editar-odeco';
        $manageRoles->display_name = 'Editar Odeco';
        $manageRoles->sort         = 44;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();

        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'eliminar-odeco';
        $manageRoles->display_name = 'Eliminar Odeco';
        $manageRoles->sort         = 45;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();

        //Categoría AIP
        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'ver-categoriaBoletin';
        $manageRoles->display_name = 'Ver Categoría Boletín';
        $manageRoles->sort         = 46;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();


        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'crear-categoriaBoletin';
        $manageRoles->display_name = 'Crear Categoría Boletín';
        $manageRoles->sort         = 47;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();


        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'editar-categoriaBoletin';
        $manageRoles->display_name = 'Editar Categoría Boletín';
        $manageRoles->sort         = 48;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();

        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'eliminar-categoriaBoletin';
        $manageRoles->display_name = 'Eliminar Categoría Boletín';
        $manageRoles->sort         = 49;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();

        //Boletín AIP
        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'ver-boletin';
        $manageRoles->display_name = 'Ver Boletín';
        $manageRoles->sort         = 50;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();


        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'crear-boletin';
        $manageRoles->display_name = 'Crear Boletín';
        $manageRoles->sort         = 51;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();


        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'editar-boletin';
        $manageRoles->display_name = 'Editar Boletín';
        $manageRoles->sort         = 52;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();

        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'eliminar-boletin';
        $manageRoles->display_name = 'Eliminar Boletín';
        $manageRoles->sort         = 53;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();

        //fragmento estático
        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'ver-fragmento-estatico';
        $manageRoles->display_name = 'Ver Fragmento Estático';
        $manageRoles->sort         = 54;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();

        //fragmento dinámico
        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'ver-fragmento-codigo';
        $manageRoles->display_name = 'Ver Fragmento Código';
        $manageRoles->sort         = 55;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();


        //Compra Boletín AIP
        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'ver-compraBoletin';
        $manageRoles->display_name = 'Ver Solicitud Boletín AIP';
        $manageRoles->sort         = 56;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();


        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'activar-compraBoletin';
        $manageRoles->display_name = 'Activar Solicitud Boletín AIP';
        $manageRoles->sort         = 57;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();

        //publicar articulo transparencia
        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'publicar-contenido-transparencia';
        $manageRoles->display_name = 'Publicar contenido transparencia';
        $manageRoles->sort         = 58;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();


        //publicador articulo transparencia
        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'publicador-contenido-transparencia';
        $manageRoles->display_name = 'Publicar Contenido Transparencia';
        $manageRoles->sort         = 59;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();

        //asignacion de usuario  a cliente

        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'ver-usuarios-sobrevuelos';
        $manageRoles->display_name = 'Ver Usuarios';
        $manageRoles->sort         = 60;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();

        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'cambiar-cliente';
        $manageRoles->display_name = 'Cambiar Cliente';
        $manageRoles->sort         = 61;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();

        $permission_model          = config('access.permission');
        $manageRoles               = new $permission_model;
        $manageRoles->name         = 'agregar-cliente-usuario';
        $manageRoles->display_name = 'Agregar Cliente a Usuario';
        $manageRoles->sort         = 62;
        $manageRoles->created_at   = Carbon::now();
        $manageRoles->updated_at   = Carbon::now();
        $manageRoles->type         = 'M';
        $manageRoles->save();

        



        if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}