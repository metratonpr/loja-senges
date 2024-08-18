<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Pegar uma pagina e passar atributos via url
Route::get('/empresa', function() {
    return view('site/empresa');
});

//Permitir todos os tipos de acesso, acesso inseguro
Route::any('/any', function(){
    return "Permite todo tipo de acesso http (put, delete, get, post)";
});

//Inverso da any
Route::match(['get','post'],'/match', function(){
    return "Permite apenas acessos definidos";
});

// Passagem de parametro, use ? e coloque um valor default para ser opcional
Route::get("/parametro/{id}/{cat?}", function($id,$cat = ""){
    return "o id do produto é: ".$id."<br>"."Categoria: ".$cat;
});


//Redirect
Route::get('/sobre', function(){
 return   redirect('/empresa');
});

Route::redirect('/redirect','/empresa');

Route::view('/view','site/empresa');

//Rotas nomeadas
Route::get('/news',function(){
    return view('news');
})->name('noticias');

Route::get('/novidades',function(){
return redirect()->route('noticias');
});
