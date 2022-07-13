<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

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

// Ejercicio 1

Route::get('/ejercicio1', function () {
    return "GET OK";
});

Route::post('/ejercicio1', function () {
    return "POST OK";
});


Route::post('/ejercicio2/a', function (Request $request) {
    return Response::json([
        'name' =>'Keyboard',
        'description' =>'Mechanical RGB keyboard',
        'price' => $request->get('price'),
    ]);
});

Route::post('/ejercicio2/b', function (Request $request) {
    if( $request->get('price') < 0) {
            return Response::json(['message' => "Price can't be less than 0"])->setStatusCode(422);

        } ;
 
    return Response::json(
        [
            'name' => 'Keyboard',
            'description' => 'Mechanical RGB keyboard ',
            'price' => $request->get('price'),
        ]
        );

}); 

  
Route::post('/ejercicio2/c' , function(Request $request){
        $descount = 0;

        if( $request->get('discount') == "SAVE5"){
             $descount=5;
        }
        else if ( $request->get('discount') == "SAVE10"){
             $descount=10;
        }
        else if ( $request->get('discount') == "SAVE15"){
             $descount=15;
        }
        
        //calculation price
        $price = (100- $descount)/ 100 * $request->get('price');

        return Response::json(
            [
                'name' => 'Keyboard',
                'description' => 'Mechanical RGB keyboard',
                'price' =>$price,
                'discount' =>$descount
            ]
            );
});