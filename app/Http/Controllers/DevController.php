<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
class DevController extends \App\Http\Controllers\Controller{
    
    private $data_sets = ["1"=>"陈娇颖","2"=>"郑升","3"=>"沈佳","4"=>"陈倩倩","5"=>"亚红姐姐","6"=>'张路小妹妹'];
    private $showcase='happy valentine day!';
    private $valid_name = "you could not set other name!";
    
    public function show(Request $request){
        $uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
//        return view("web.valen",['origin'=>$result,"name"=>$this->get_valid_name()]);
        $res = $this->get_valid_name();
        $result = $res[0]."<br />".$res[1]."<br />".$this->showcase;
        return view("web.anim",["name"=>$result]);
    }
    public function index(){
        return view("web.rainbow",["name"=>$this->get_valid_name()]);
    }
   
    private function get_valid_name(){
       $s = filter_input(INPUT_GET,"name");
       if($s==null||$s==="1"){
           return ["陈娇颖","I love you"];
       }
       if(array_key_exists($s,$this->data_sets)){
           return [$this->data_sets[$s],""];
       }
       echo $this->valid_name;
       exit();
    }
    

    
}

