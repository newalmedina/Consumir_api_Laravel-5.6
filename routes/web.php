<?php

use GuzzleHttp\Client;

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

    $client = new Client([
        // Base URI is used with relative requests
        'base_uri' => 'https://mindicador.cl',
        // You can set any number of default request options.
        'timeout'  => 2.0,
    ]);

    // Send a request to https://foo.com/api/test
    $respuesta = $client->request('GET', 'api');
    $dolar = (string) $respuesta->getBody();
    $dolar = json_decode($dolar, true);


    $client2 = new Client([
        // Base URI is used with relative requests
        'base_uri' => 'http://jsonplaceholder.typicode.com',
        // You can set any number of default request options.
        'timeout'  => 2.0,
    ]);

    // Send a request to https://foo.com/api/test
    $respuesta2 = $client2->request('GET', 'posts');
    $mensajes = (string) $respuesta2->getBody();
    $mensajes = json_decode($mensajes, true);

    return view('welcome', compact('dolar', 'mensajes'));
});
Route::get('/index', 'ApiController@index');
Route::get('/show/{id}', 'ApiController@show');
Route::get('/add', 'ApiController@add');
Route::get('/edit/{id}', 'ApiController@edit');
Route::get('/delete/{id}', 'ApiController@delete');
