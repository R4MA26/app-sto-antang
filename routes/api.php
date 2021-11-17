<?php

use App\Http\Controllers\API\V1\ProductController;
use App\Http\Controllers\API\V1\SelesController;
use App\Http\Controllers\API\V1\DuaController;
use App\Http\Controllers\API\V1\EmpatController;
use App\Http\Controllers\API\V1\TigaController;
// use App\Http\Controllers\API\V1\UserController;
// use App\Http\Controllers\API\V1\CategoryController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

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

Route::get('version', function () {
    return response()->json(['version' => config('app.version')]);
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    Log::debug('User:' . serialize($request->user()));
    return $request->user();
});

// Route::get('/product', [ProductController::class, 'index']);

// Route::get('/siswa', 'ProductController@index');
// Route::get('/siswa/export_excel', 'ProductController@export_excel');
Route::namespace('App\\Http\\Controllers\\API\V1')->group(function () {
        Route::get('/product', [ProductController::class, 'index']);
        // Route::get('/product/multiply', [ProductController::class, 'multiply']);
        Route::get('/product/export_excel', [ProductController::class, 'export_excel']);
        Route::post('/product/import_excel', [ProductController::class, 'saveExel']);
        Route::delete('/product/{id}', [ProductController::class, 'destroy']);
        Route::get('/product/show/{id}', [ProductController::class, 'show']);

        Route::get('/seles', [SelesController::class, 'index']);

        Route::get('/dua', [DuaController::class, 'index']);
        Route::delete('/dua/{id}', [DuaController::class, 'destroy']);
        Route::post('/dua/import_excel', [DuaController::class, 'saveExel']);
        Route::get('/dua/export_excel', [DuaController::class, 'export_excel']);

        Route::get('/tiga', [TigaController::class, 'index']);
        Route::delete('/tiga/{id}', [TigaController::class, 'destroy']);
        Route::post('/tiga/import_excel', [TigaController::class, 'saveExel']);
        Route::get('/tiga/export_excel', [TigaController::class, 'export_excel']);

        Route::get('/empat', [EmpatController::class, 'index']);
        Route::delete('/empat/{id}', [EmpatController::class, 'destroy']);
        Route::post('/empat/import_excel', [EmpatController::class, 'saveExel']);
        Route::get('/empat/export_excel', [EmpatController::class, 'export_excel']);



        // Route::get('/seles', [SelesController::class, 'index']);
        // Route::get('/user', [UserController::class, 'index']);
        // Route::post('/user', [UserController::class, 'store']);

        Route::apiResources([
            'user' => 'UserController',
            'category' => 'CategoryController'
        ]);
        
        

});


// Route::namespace('App\\Http\\Controllers\\API\V1')->group(function () {
//     Route::get('profile', 'ProfileController@profile');
//     Route::put('profile', 'ProfileController@updateProfile');
//     Route::post('change-password', 'ProfileController@changePassword');
//     Route::get('tag/list', 'TagController@list');
//     Route::get('category/list', 'CategoryController@list');
//     // Route::get('product', 'ProductController@index');

//     // Route::post('product/upload', 'ProductController@index');

//     // Route::post('users/import', 'UsersController@import');


//     Route::apiResources([
//         'user' => 'UserController',
//         // 'product' => 'ProductController',
//         'category' => 'CategoryController',
//         'tag' => 'TagController',
//     ]);
// });
