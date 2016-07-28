<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

class WebHookController extends \App\Http\Controllers\Controller{
    
    
    public function show(){
        echo var_dump($_POST);
    }
    
    public function index(){
        $this->dispatch(new \App\Jobs\CommandJob());
    }
    
    public function store(){
          $this->dispatch(new \App\Jobs\CommandJob());
    }
}
