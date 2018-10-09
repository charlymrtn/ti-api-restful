<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::ApiResource('usuarios', 'UserController')->parameters([
    'usuarios' => 'usuario'
]);

Route::ApiResource('categorias', 'CategoryController')->parameters([
    'categorias' => 'categoria'
]);

Route::ApiResource('productos', 'ProductController')->parameters([
    'productos' => 'producto'
]);

Route::ApiResource('transacciones', 'TransactionController')->parameters([
    'transacciones' => 'transaccion'
]);

// Route::apiResources([
//     'usuarios' => 'UserController',
//     'categorias' => 'CategoryController',
//     'productos' => 'ProductController',
//     'transacciones' => 'TransactionController'
// ])->parameters([
//     'usuarios' => 'usuario',
//     'categorias' => 'categoria',
//     'productos' => 'producto',
//     'transacciones' => 'transaccion'
// ]);
