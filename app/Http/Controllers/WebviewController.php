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
        return json_decode($this->getSuggestData());
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
//         return json_encode($argument);
        return  view("web.".$relative_action);
    }
    
    private function getSuggestData(){
        return <<<'EOF'
            [
                {
                  "typename": "今日阅读推荐",
                  "logo": "http://api.mcloudlife.com/img/app/home_icon_read.png",
                  "title": "心脏保健从小事做起",
                  "note": "最新资料显示，我国平均每5个成年人中就有1人患有心脏疾病，全国每年死于心血管病的患者有350万。专家",
                  "url": "http://api.mcloudlife.com/app/article?syncid=15322&more=1&id=312",
                  "image": "http://api.mcloudlife.com/img/article/img_bp_read_42.png",
                  "more_url": "http://api.mcloudlife.com/app/articleList?syncid=15322&type=read",
                  "html": "deprecated",
                  "more": [
                    {
                      "title": "家庭血压测量注意事项",
                      "note": "家庭血压测量（HBPM）简便易行，已成为高血压诊断和治疗效果评价的重要手段。与诊室血压相比，在家测量",
                      "url": "http://api.mcloudlife.com/app/article?syncid=15322&more=1&id=351",
                      "image": "http://api.mcloudlife.com/img/article/img_bp_read_36.png"
                    }
                  ]
                },
                {
                  "typename": "今日饮食推荐",
                  "logo": "http://api.mcloudlife.com/img/app/home_icon_read.png",
                  "title": "警惕：钙不足，血压也会升高",
                  "note": "低钙饮食易导致血压升高。钙摄入量与年龄相关性收缩压升高幅度呈负相关，钙摄入量<500mg/天的",
                  "url": "http://api.mcloudlife.com/app/article?syncid=15322&more=1&id=300",
                  "image": "http://api.mcloudlife.com/img/article/img_bp_food_1.png",
                  "more_url": "http://api.mcloudlife.com/app/articleList?syncid=15322&type=food",
                  "html": "deprecated",
                  "more": [
                    {
                      "title": "巧吃主食控血糖",
                      "note": "一项实验表明，蛋白质对食物的血糖指数（GI）的影响显著，同样食用含50克碳水化合物的食物，其血糖生成",
                      "url": "http://api.mcloudlife.com/app/article?syncid=15322&more=1&id=327",
                      "image": "http://api.mcloudlife.com/img/article/img_all_food_15.png"
                    }
                  ]
                }
                ]
EOF;
    }
    
}
