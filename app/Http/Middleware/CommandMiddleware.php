<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Middleware;

use Closure;

class CommandMiddleware{
    
    
    public function handle($request,Closure $closure){
        
        return $closure($request);
    }
}
