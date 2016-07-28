<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Providers;
use Storage;
use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Ftp as FtpAdapter;
use Illuminate\Support\ServiceProvider as ServiceProvider;

class FtpFilesystemServiceProvider extends  ServiceProvider {

        //boot 
        public function boot()
        {
        Storage::extend('ftp',function($app, $config){

        //init the client 
        $client = new FtpAdapter($config);

        //lets now call the obj 
        $ftpFileSystem = new Filesystem($client);

        //return 
        return $ftpFileSystem;
        }); 

        }//end boot 


         public function register()
        {
            //
        }


    }
