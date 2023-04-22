<?php

namespace Foundationapp\PowerUps\Console\Commands;

use Illuminate\Console\Command;

class PowerUpList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'powerup:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show the available Power-Ups';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $powerUpComponents = json_decode(file_get_contents(app_path('PowerUps') . '/components.json'), true);

        $powerUpArray = [];
        foreach($powerUpComponents['installed'] as $key => $powerUp){
            $enabled = true;
            if(!in_array($key, $powerUpComponents['active'])){
                $enabled = false;
            }
            array_push($powerUpArray, [ $key, ($enabled) ? 'Enabled' : 'Disabled', '<livewire:powerup.' . $key . ' />' ]);
            
        }

        $this->table(
            ['PowerUp', 'Status', 'Usage'],
            $powerUpArray
        );

    }
}
