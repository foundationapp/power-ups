<?php

namespace Foundationapp\PowerUps\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;

class PowerUpDisable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'powerup:disable {powerup}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Disable a specific Power-Up';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $powerUp = $this->argument('powerup');
        $powerUps = json_decode(file_get_contents(app_path('PowerUps') . '/components.json'), true);

        $powerUpName = ucfirst(Str::camel($powerUp));
        
        // if the $powerUps['active'] array does not contain $powerUp
        if(!in_array($powerUp, $powerUps['active'])){
            $this->info($powerUpName . ' Power-Up is already disabled');
        } else {
            // remove $powerUp from $powerUps['active']
            $key = array_search($powerUp, $powerUps['active']);
            unset($powerUps['active'][$key]);
            file_put_contents(app_path('PowerUps') . '/components.json', json_encode($powerUps));
            $this->info($powerUpName . ' Power-Up disabled');
        }
    }
}
