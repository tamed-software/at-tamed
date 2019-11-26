<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Cliente;
use App\Historicoestadocliente;
use App\Proyecto;

class respaldoDiario extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'respaldo:diario';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando que respalda diariamente los estados de clientes';

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
        
        $totalContactados = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.estado_id', 1)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $totalNoContactados = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.estado_id', 2)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $totalInstalados = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.estado_id', 3)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $totalAgendados = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.estado_id', 4)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $totalSinInformacion = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.estado_id', 5)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $totalCapacitados = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.estado_id', 9)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $totalPendientes = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.estado_id', 10)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $totalInstaladosCapacitados = Cliente::join('proyectos', 'clientes.proyecto_id', 'proyectos.id')
                            ->where('clientes.estado_id', 8)
                            ->where('proyectos.estado_id', 6)
                            ->count();

        $respaldo = new Historicoestadocliente;

        $respaldo->cant_sin_info = $totalSinInformacion;
        $respaldo->cant_no_contactados = $totalNoContactados;
        $respaldo->cant_contactados = $totalContactados;
        $respaldo->cant_agendados = $totalAgendados;
        $respaldo->cant_instalados =$totalInstalados;
        $respaldo->cant_con_observacion = $totalPendientes;
        $respaldo->cant_ins_cap = $totalInstaladosCapacitados;
        $respaldo->fecha_respaldo = date('Y-m-d');
        $respaldo->created_at = date('Y-m-d H:i:s');
        $respaldo->updated_at = date('Y-m-d H:i:s');

        $respaldo->save();

        echo "listo";

    }
}
