<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\ProvinciaController;

class MigrarDatosFijos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:migrar-datos-fijos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migra las tablas que no van a cambiar';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $povinciaController = new ProvinciaController();
        $result = $povinciaController->migrarDatosDesdeAPI();

        $this->info($result);

    }
}
