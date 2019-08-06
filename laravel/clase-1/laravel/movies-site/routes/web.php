<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('home', function () {
//     return '<h1>Bienvenidos a Laravel</h1>';
// });

Route::get('home', function () {
    $title = 'Home';
    return view('home', ['title' => $title]);
});


Route::get('products', function () {
    $products = [
      [
        'title' => 'Red social',
        'descripcion' => 'Proyecto de red social',
      ]
    ];
    return view('home', ['title' => $title]);
});


Route::get('perfil/{usuario}/', function ($usuario) {
    return "<h1>Perfil de {$usuario}</h1>";
});

// Route::get('saludar/{nombre}/{apellido}', function ($nombre, $apellido) {
//     return "<h1>Perfil de {$nombre} {$apellido}</h1>";
// });


Route::get('saludar/{nombre}/{apellido?}', function ($nombre, $apellido = 'Undefined') {
    return "<h1>Perfil de {$nombre} {$apellido}</h1>";
});
