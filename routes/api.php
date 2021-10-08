<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Business;
use\App\Http\Controllers\BusinessController;
use\App\Http\Controllers\UserAuthController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// public Routes 
Route::get('business/search/{name}', [BusinessController::class, 'search']); 
Route::post('register', [UserAuthController::class, 'register']);
Route::post('login', [UserAuthController::class, 'login']);



// protected Routes
Route::group(['middleware' => 'auth:sanctum'], function () {
    // return $request->user();
    Route::get('/business',[BusinessController::class, 'index']); 
    Route::post('/business', [BusinessController::class, 'store']);
    Route::put('/business/{id}', [BusinessController::class, 'update']); 
    Route::delete('/business/{id}',[BusinessController::class, 'destroy']); 
    Route::post('logout', [UserAuthController::class, 'logout']);
});


// Route::get('/business',[BusinessController::class, 'index']); 

// Route::post('/business', [BusinessController::class, 'store']); 

// Route::resource('business', BusinessController::class);

// Route::get('business/search/{name}', [BusinessController::class, 'search']); 




   // return Business::create([
        // 'name' => 'FLitsDesigns',
        // 'description' => 'my Company Description',
        // 'website' => 'http://www.flitsdesign.com',
        // 'slug' => 'flits-design',
        // 'andress' => 'rubaga Rd kampama uganda',
        // 'email' => 'info@flitsdesign.com',
        // 'contact' => '07738473743',
        // 'categoryName' => 'LimitedCompanys',
        // 'subcategoryName' => 'Designing',
        // 'country' => 'uganda',
        // 'fax' => '0888787878',
        // 'city' => 'kampala',
        // 'image' => 'url/image.png'
        
   // ]);
