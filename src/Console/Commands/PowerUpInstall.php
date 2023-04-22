<?php

namespace Foundationapp\PowerUps\Console\Commands;

use File;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class PowerUpInstall extends Command
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
        // if the $repo contains http or https, show an error message to the user that they need to use the format: vendor/repo
        if(Str::contains($repo, 'http') || Str::contains($repo, 'https')){
            $this->error('Please use the format: vendor/repo');
            return;
        }

        // Separate the vendor/repo by exploding the string from the / character
        $vendorRepo = explode('/', $repo);
        // if $vendorRepo offset 0 and 1 do not exist show error to user that they need to use the format: vendor/repo
        if(!isset($vendorRepo[0]) || !isset($vendorRepo[1])){
            $this->error('Please use the format: vendor/repo');
            return;
        }
        
        $vendor = $vendorRepo[0];
        $repo = $vendorRepo[1];
        $repoSlug = Str::snake($repo, '-');

        $apiURL = 'https://api.github.com/repos/' . $vendor . '/' . $repo . '/releases/latest';

        $response = Http::get( $apiURL )->json();
        $zipURL = $response['zipball_url'];

        // file_get_contents of the zipball and add it to the storage temp directory
        //$zipBallContents = Storage::download($zipBall);

        $zipResponse = Http::get($zipURL);
        
        Storage::put('powerup-tmp/' . $repoSlug . '.zip', $zipResponse->body());

        // Unzip the Storage::get('powerup-tmp/' . $repoSlug . '.zip') file
        $zip = new ZipArchive;

        $res = $zip->open( storage_path('app/powerup-tmp/' . $repoSlug . '.zip') );

        if ($res === TRUE) {
            $out = $zip->extractTo(storage_path('app/powerup-tmp/'));
            $folderName = $zip->getNameIndex(0);
            $zip->close();

            $folderNameCamelCase = ucfirst(Str::camel($repoSlug));

            //rename $folderName to $folderNameCamelCase
            rename(storage_path('app/powerup-tmp/' . $folderName), storage_path('app/powerup-tmp/' . $folderNameCamelCase));

            //Storage::move(storage_path('app/powerup-tmp/' . $folderName), storage_path('app/powerup-tmp/' . $folderNameCamelCase));
            
            File::move(storage_path('app/powerup-tmp/' . $folderNameCamelCase), app_path('PowerUps/Components/' . $folderNameCamelCase) );
            $this->info('Successfully Installed');
        } else {
            echo 'doh!';
        }

        // dd($zipBallContents);

        // store the zipball contents in the temp directory
        //$zipBallPath = storage_path('app/temp/' . $repo . '.zip');



        // dd($response);
        //dd($response->json());


        
    }
}
