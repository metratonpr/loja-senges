<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SiteController;
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

//php artisan route:list lista todas as rotas
//php artisan route:cache criar um arquivo de cache de rota, deixa as rotas mais rapidos
//php artisan route:clear serve para remover o arquivo de cache


Route::get('/', function () {
    return view('welcome');
});


// Pegar uma pagina e passar atributos via url
Route::get('/empresa', function () {
    return view('site/empresa');
});

//Permitir todos os tipos de acesso, acesso inseguro
Route::any('/any', function () {
    return "Permite todo tipo de acesso http (put, delete, get, post)";
});

//Inverso da any
Route::match(['get', 'post'], '/match', function () {
    return "Permite apenas acessos definidos";
});

// Passagem de parametro, use ? e coloque um valor default para ser opcional
Route::get("/parametro/{id}/{cat?}", function ($id, $cat = "") {
    return "o id do produto é: " . $id . "<br>" . "Categoria: " . $cat;
});


//Redirect
Route::get('/sobre', function () {
    return   redirect('/empresa');
});

Route::redirect('/redirect', '/empresa');

Route::view('/view', 'site/empresa');

//Rotas nomeadas
Route::get('/news', function () {
    return view('news');
})->name('noticias');

Route::get('/novidades', function () {
    return redirect()->route('noticias');
});


//Grupo de Rotas

// Route::prefix('admin')->group(function(){

//     Route::get('/dashboard', function(){
//         return "dashboard";
//     })->name('admin.dashboard');

//     Route::get('/users', function(){
//         return "users";
//     })->name('admin.users');

//     Route::get('/groups', function(){
//         return "grupos";
//     })->name('admin.groups');


// });

// Route::name('admin.')->group(function () {

//     Route::get('/dashboard', function () {
//         return "dashboard";
//     })->name('dashboard');

//     Route::get('/users', function () {
//         return "users";
//     })->name('users');

//     Route::get('/groups', function () {
//         return "grupos";
//     })->name('groups');
// });

// as = nome das rotas do grupo
Route::group(['prefix' => 'admin', 'as' => 'admin.'],function () {

    Route::get('/dashboard', function () {
        return "dashboard";
    })->name('dashboard');

    Route::get('/users', function () {
        return "users";
    })->name('users');

    Route::get('/groups', function () {
        return "grupos";
    })->name('groups');
});

//Rota com controller
//Informar o namespace

Route::get('/produto/{id?}', [ProdutoController::class, 'show'])->name('produto.show');

//Resources: recursos genericos
//php artisan make:controller ProductController --resource
Route::resource('products',ProductController::class);

Route::get('/', [SiteController::class, 'index'])->name('site.index');
Route::get('/produtos/{slug}', [SiteController::class, 'details'])->name('site.details');
Route::get('/categoria/{id}', [SiteController::class, 'categoria'])->name('site.categoria');


Route::get('/carrinho',[CarrinhoController::class, 'carrinhoLista'])->name('site.carrinho');
Route::post('/carrinho',[CarrinhoController::class, 'adcionaCarrinho'])->name('site.addcarrinho');