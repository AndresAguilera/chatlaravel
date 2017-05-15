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
Route::get('/chat', function () {

    // recibir mensaje del cliente y guardarlo en la bd

    if(isset($_GET['msg'])){
        $msg = new \App\Mensaje();
        $msg->usuario = $_GET['user'];
        $msg->texto = $_GET['msg'];
        $msg->fecha = \Carbon\Carbon::now();
        $msg->save();
    }

    // obtener mensajes de la bd

    $mensajes = App\Mensaje::all();


    // paso los datos a la plantilla blade

    return view('chat', ['mensajes' => $mensajes]);
});

Route::post('/chatpost', function () {

    // recibir mensaje del cliente y guardarlo en la bd

    $msg = new \App\Mensaje();
    $msg->usuario = $_POST['user'];
    $msg->texto = $_POST['msg'];
    $msg->fecha = \Carbon\Carbon::now();
    $msg->save();

//     obtener mensajes de la bd

    $mensajes = App\Mensaje::all();

//     paso los datos a la plantilla blade

    return view('chat', ['mensajes' => $mensajes]);
});
