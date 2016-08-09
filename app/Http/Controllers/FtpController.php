<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
/**
 * Description of FtpController
 *
 * @author 44260
 */
class FtpController extends Controller {
    //put your code here
    
    public function show(){
        
    }
    
    public function index(){
        $result=[];
        $ret= Storage::disk('ftp')->allFiles("Android/mPregnancy");
        foreach ($ret as $value) {
            if(!$this->checkSuffix($value)){
                continue;
            }
             array_push($result, $value);
        }
        return view("web.card",["files"=>$result]);
    }
    
    private function checkSuffix($filename){
        if($filename===null){
            return false;
        }
        return pathinfo($filename,PATHINFO_EXTENSION)=="apk";
    }


}
