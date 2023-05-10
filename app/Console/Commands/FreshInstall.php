<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class FreshInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fresh:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Doing fresh install for the application';

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
        $this->info(PHP_EOL.'Doing key generation...');
        Artisan::call('key:generate');
        $this->info('Doing migration...');
        Artisan::call('migrate:fresh');
        $this->info('Doing seeding...');
        Artisan::call('db:seed');
        $this->info('Done!');
    }
}