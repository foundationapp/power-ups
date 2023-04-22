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
    protected $signature = 'powerup:enable {powerup}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enable a specific Power-Up';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $powerUp = $this->argument('powerup');
        $powerUps = json_decode(file_get_contents(app_path('PowerUps') . '/powerup.json'), true);

        $powerUpName = ucfirst(Str::camel($powerUp));
        
        // if the $powerUps['active'] array contains $powerUp
        if(in_array($powerUp, $powerUps['active'])){
            $this->info($powerUpName . ' Power-Up is already enabled');
        } else {
            $powerUps['active'][] = $powerUp;
            file_put_contents(app_path('PowerUps') . '/powerup.json', json_encode($powerUps));
            $this->info($powerUpName . ' Power-Up enabled');
            $this->line('Use by adding <livewire:powerup.' . $powerUp . ' /> to any view');
        }
    }
}
