<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class LogClear extends Command
{

    protected $signature = 'log:clear';


    protected $description = 'Clear log file';


    public function handle()
    {
        exec('echo "" > ' . storage_path('logs/laravel.log'));
        $this->info("INFO  Console command clear successfully.");

    }
}
