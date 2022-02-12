<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;
use App\Models\Todo;
use App\Models\User;
use Carbon\Carbon;

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

Route::get('/', function() {
    $geoData = file_get_contents('http://ip-api.com/php/'.request()->ip().'');
    $data = unserialize($geoData);
    $generalTasks = Todo::where('isPublic', 'yes')->with('user')->orderBy('created_at', 'ASC')->paginate(10);
    $timezone = $data['timezone'];

    return view('welcome', compact('generalTasks', 'timezone'));
});



Auth::routes();

Route::middleware(['auth'])->group( function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('/mytasks', TodoController::class);
});
    
