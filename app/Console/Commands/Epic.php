<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Api\NasaApiController;

class Epic extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nasa:epic';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Nasa Epic Api';

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
     * @return int
     */
    public function handle()
    {
        $this->info('Epic Started');
        $controller = app()->make(NasaApiController::class);
        $controller->EpicApi();

        $this->info('Epic Completed');
    }
}
