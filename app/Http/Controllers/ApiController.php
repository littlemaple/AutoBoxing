<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

class ApiController extends \App\Http\Controllers\Controller{
    
   public function show(){
        return view("api.index");
    }
    
    public function index(){
        return view("api.index");
    }
    
    public function store(){
        echo "";
    }
}
