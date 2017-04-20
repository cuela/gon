<?php

use Illuminate\Database\Seeder;

class SecuenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::connection()->getName() == 'pgsql')
	    {
	        $tablesToCheck = array('menus', 'fragmento_categorias', 'fragmentos','contenidos','fragmento_estaticos','fragmento_codigos', 'plantillas', 'roles', 'users','accions', 'modulos', 'modulo_rols');
	        foreach($tablesToCheck as $tableToCheck)
	        {
	            $this->command->info('Checking the next id sequence for '.$tableToCheck);
	            $highestId = DB::table($tableToCheck)->select(DB::raw('MAX(id)'))->first();
	            $nextId = DB::table($tableToCheck)->select(DB::raw('nextval(\''.$tableToCheck.'_id_seq\')'))->first();
	            if($nextId->nextval < $highestId->max)
	            {
	                DB::select('SELECT setval(\''.$tableToCheck.'_id_seq\', '.$highestId->max.')');
	                $highestId = DB::table($tableToCheck)->select(DB::raw('MAX(id)'))->first();
	                $nextId = DB::table($tableToCheck)->select(DB::raw('nextval(\''.$tableToCheck.'_id_seq\')'))->first();
	                if($nextId->nextval > $highestId->max)
	                {
	                    $this->command->info($tableToCheck.' autoincrement corrected');
	                }
	                else
	                {
	                    $this->command->info('Arff! The nextval sequence is still all screwed up on '.$tableToCheck);
	                }
	            }
	        }
	    }
    }
}
