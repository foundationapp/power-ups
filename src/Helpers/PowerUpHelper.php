<?php

namespace Foundationapp\PowerUps\Helpers;

class PowerUpHelper {

    public static function createPowerUpFileAndFolders() {
        // if the app_path('PowerUps') folder does not exist, create it
        if (!file_exists(app_path('PowerUps'))) {
            mkdir(app_path('PowerUps'));
        }

        // if the app_path('PowerUps/Components') folder does not exist, create it
        if (!file_exists(app_path('PowerUps/Components'))) {
            mkdir(app_path('PowerUps/Components'));
        }

        // if the app_path('PowerUps/components.json') file does not exist, then create it
        if (!file_exists(app_path('PowerUps/components.json'))) {
            file_put_contents(app_path('PowerUps/components.json'), '{}');
        }

        // if the app_path('PowerUps/powerup.json') file does not exist, then create it
        if (!file_exists(app_path('PowerUps/powerup.json'))) {
            file_put_contents(app_path('PowerUps/powerup.json'), '{"active": []}');
        }
    }

}