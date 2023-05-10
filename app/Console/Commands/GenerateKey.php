<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateKey extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'key:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a new application key';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $key = $this->generateRandomKey();
        $this->setKeyInEnvironmentFile($key);
        $this->info('Application key generated successfully!');
    }

    /**
     * Generate a random application key.
     *
     * @return string
     */
    protected function generateRandomKey()
    {
        return 'base64:'.base64_encode(random_bytes(32));
    }

    /**
     * Set the application key in the environment file.
     *
     * @param  string  $key
     * @return void
     */
    protected function setKeyInEnvironmentFile($key)
    {
        file_put_contents(base_path('.env'), str_replace(
            'APP_KEY='.$this->laravel['config']['app.key'],
            'APP_KEY='.$key,
            file_get_contents(base_path('.env'))
        ));
    }
}
