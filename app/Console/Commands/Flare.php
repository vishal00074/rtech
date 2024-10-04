<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Api\FlareController;



class Flare extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nasa:flare';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Nasa Flare Api';

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
        $controller = app()->make(FlareController::class);
        $controller->FlareApi();

        $this->info('Flare Completed');
    }
}
