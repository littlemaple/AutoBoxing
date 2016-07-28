<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class PackCommand extends Command{
    
    /**
     *execute package command
     * @var type 
     */
    protected $signature = "autoboxing";
    
    /**
     *
     * @var type 
     */
    protected $description = 'autoboxing the apk';
    
    protected $command = "cd ../../AndroidStudio/mcloud_project && dev.sh";
    public function handle(){
        set_time_limit(0);
        $process = new Process('cd ../../AndroidStudio/mcloud_project && dev.sh');
        $process->start();
//        $process->run(function ($type, $buffer) {
//            if (Process::ERR === $type) {
//                echo 'ERR > '.$buffer;
//            } else {
//                echo 'OUT > '.$buffer;
//            }
//        });
//        $process->wait(function ($type, $buffer) {
//            if(Process::ERR === $type) {
//                echo '<pre><br>ERR > '.$buffer."</pre>";
//            }else {
//                echo '<pre><br>OUT > '.$buffer."</pre>";
//            }
//       });
    }
}