<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class StorageController extends \App\Http\Controllers\Controller{
    
    public function show(Request $request){
       $uri =  $request->getRequestUri();
       $file_name = rtrim(ltrim(str_replace("/storage/", "",$uri)));
       $exists = Storage::disk('local')->exists($file_name);
       if($exists){
           return response(Storage::get($file_name));
       }else{
           return response("the file is not exist",404);
       }
    }
    public function index(){

     $files = Storage::disk('ftp')->listContents("/");
     foreach ($files as $f=>$con){
         echo "<pre>".var_dump($f).  var_dump($con)."<br></pre>";
     }
//        return response("the file is not exist",404);
    }
    
}
