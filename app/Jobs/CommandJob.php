<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Jobs;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;
class CommandJob extends \App\Jobs\Job implements ShouldQueue{
    
    public function handle(){
//        $exists = Storage::disk('public')->put
        $content = file_get_contents("http://www.mcloudlife.com/");
        Storage::put("index.jpg",$content);
        echo "end";
    }
}
