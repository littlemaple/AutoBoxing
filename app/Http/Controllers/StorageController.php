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
       $file_name= "/Android/mPregnancy/".$file_name;
       $exists = Storage::disk('ftp')->exists($file_name);
       if($exists){
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.$file_name.'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . Storage::disk("ftp")->size($file_name));
            echo Storage::disk("ftp")->get($file_name);
            exit();
       }else{
           return response("the file is not exist",404);
       }
    }
   
    public function index(){
        return view("error",["code"=>404]);
    }
    
}
