<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Jobs\SendMailJob;
class CommandController extends \App\Http\Controllers\Controller{
    
    public function show(){
        $this->dispatch((new SendMailJob())->delay(200));
        return new \Illuminate\Http\Response();
    }
    
    public function index(){
     return new \Illuminate\Http\Response();
    }
    
    public function store(){
        return new \Illuminate\Http\Response();
    }
}