<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class RMSCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rms';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rollback, migrate and seed the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Artisan::call('migrate:rollback');

        Artisan::call('migrate');

        Artisan::call('db:seed');
    }
}
