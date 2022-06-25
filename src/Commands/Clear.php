<?php

namespace Appstract\Opcache\Commands;

use Appstract\Opcache\CreatesRequest;
use Illuminate\Console\Command;

class Clear extends Command
{
    use CreatesRequest;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'opcache:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear OPCache';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $response = $this->sendRequest('clear');
        $response->throw();

        if (!empty($response['result'])) {
            $this->info('OPcache cleared');
        } else {
            $this->warn('result failed!');
            $this->output->info($response->body());

            return 2;
        }
    }
}
