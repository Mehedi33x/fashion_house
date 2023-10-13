<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;

class CreatePermission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permission:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create all routes as a permission into permission table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // $allRoutes = Route::getRoutes();
        // dd($allRoutes);
    }
}
