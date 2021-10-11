<?php

use App\Http\Controllers\API\V1\ProductController;

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
        Route::get('/product/export_excel', [ProductController::class, 'export_excel']);
        Route::post('/product/import_excel', [ProductController::class, 'import_excel']);
        Route::delete('/product/{id}', [ProductController::class, 'destroy']);

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
