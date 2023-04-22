<?php

namespace Foundationapp\PowerUps\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;

class PowerUpEnable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'powerup:install {repo}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install a Power-up from a Github repository';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $repo = $this->argument('repo');

        dd($repo);

        
    }
}
