<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class WebviewController extends \App\Http\Controllers\Controller{
    
    public function store(){
        echo "";
    }
    
    public function index(){
        return view("webview");
    }
    public function show(Request $request){
         $relative_action = rtrim(ltrim(str_replace("/web/webview/","",$request->getRequestUri())));
         $argument=["content"=>''];
         if($relative_action=='process'){
             $content ="<table>";
             $users = DB::select("select * from pack_log");
             foreach($users as &$val){
                 $content .="<tr>";
                 foreach($val as $key=>$value){
                     $content.="<td>".$key."=>".$value."</td>";
                 }
                 $content.="</td>";
             }
             $content .="</table>";
             $argument['content']=$content;
         }
        return  view("web.".$relative_action,$argument);
    }
    
}
