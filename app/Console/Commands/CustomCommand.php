<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CustomCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'custom:command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Desactivar las convocatorias pasadas';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        //$convocatorias = DB::select("select * from convocatorias where hora_fin::time < '".$hora."' and fecha_fin<='".$fecha."'");
        $convocatorias = DB::select("select * from convocatorias where fecha_fin<'".$fecha."'");
        
        if(count($convocatorias)>0)
        foreach ($convocatorias as $convocatoria) {
            $conv =DB::table('convocatorias')->where('id',$convocatoria->id)->update(['estado'=>0]);
        }

        //para boletínes AIP
        $compraBoletines = DB::select("select * from compra_boletins where  fecha_fin_activacion <'".$fecha."'");
        if(count($compraBoletines)>0)
        foreach ($compraBoletines as $compra_boletins) {
            $conv =DB::table('compra_boletins')->where('id',$compra_boletins->id)->update(['estado'=>3]);
        }
    }
}
