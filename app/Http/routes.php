<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Artisan;
Route::get('/', function () {
    return view('welcome');
});

Route::resource('command', 'CommandController');

Route::resource("hook",'WebHookController');


Route::get("boxing",function(){
       Artisan::call("autoboxing");
});


Route::resource("storage","StorageController");

Route::resource("api","ApiController");

Route::resource("web/webview","WebviewController");

Route::resource("rainbow","DevController");

