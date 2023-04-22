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
            file_put_contents(app_path('PowerUps/components.json'), '{"installed": [], "active": []}');
        }
    }

    public static function addPowerUpToComponentsJson($powerUp, $repo) {
        $powerUpComponents = json_decode(file_get_contents(app_path('PowerUps') . '/components.json'), true);
        $powerUpComponents[$powerUp] = $repo;
        file_put_contents(app_path('PowerUps') . '/components.json', json_encode($powerUpComponents));
    }

    public static function installPowerUpInComponentsJson($slug, $name, $description, $version, $repo){
        $powerUpComponents = json_decode(file_get_contents(app_path('PowerUps') . '/components.json'), true);
        if(!isset($powerUpComponents['installed'])){
            $powerUpComponents['installed'] = [];
        }

        $powerUpComponents['installed'][$slug] = [
            'name' => $name,
            'description' => $description,
            'version' => $version,
            'repo' => $repo
        ];

        file_put_contents(app_path('PowerUps') . '/components.json', json_encode($powerUpComponents));
    }

}