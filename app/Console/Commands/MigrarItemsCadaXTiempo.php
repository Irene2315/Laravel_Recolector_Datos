<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\LecturaItemMeteoController;

class MigrarItemsCadaXTiempo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:migrar-items-cada-x-tiempo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migramos los datos de los itemns meteorologicos de los lugares';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $meteoIrunController = new LecturaItemMeteoController();
        $resultIrun = $meteoIrunController->migrarDatosMeteoIrun();

        $meteoTolosaController = new LecturaItemMeteoController();
        $resultTolosa = $meteoTolosaController->migrarDatosMeteoTolosa();

        $meteoDebaController = new LecturaItemMeteoController();
        $resultDeba = $meteoDebaController->migrarDatosMeteoTolosa();

        $meteoApeitiaController = new LecturaItemMeteoController();
        $resultAzpeitia = $meteoApeitiaController->migrarDatosMeteoAzpeitia();

        $meteoBermeoController = new LecturaItemMeteoController();
        $resultBermeo = $meteoBermeoController->migrarDatosMeteoBermeo();

        $meteoDonostiController = new LecturaItemMeteoController();
        $resultDonosti = $meteoDonostiController->migrarDatosMeteoDonosti();

        $meteoEibarController = new LecturaItemMeteoController();
        $resultEibar = $meteoEibarController->migrarDatosMeteoEibar();

        $meteoBilbaoController = new LecturaItemMeteoController();
        $resultBilbao = $meteoBilbaoController->migrarDatosMeteoBilbao();

        $this->info($resultIrun);
        $this->info($resultTolosa);
        $this->info($resultDeba);
        $this->info($resultAzpeitia);
        $this->info($resultBermeo);
        $this->info($resultDonosti);
        $this->info($resultEibar);
        $this->info($resultBilbao);
    }
}
