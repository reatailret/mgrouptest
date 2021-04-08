<?php

use App\Http\Controllers\TestController;
use App\Http\Resources\RowsCollection;
use App\Models\Row;
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
Route::get('/rows', function () {
    return new RowsCollection(Row::all());
});
Route::post('/upload', [TestController::class,'upload']);
