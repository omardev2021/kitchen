<?php


use App\Http\Controllers\CitiesController;
use App\Http\Controllers\FoodsController;

use App\Http\Controllers\MatchingController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SubmissionController;
use App\Models\City;
use App\Models\Food;
use App\Models\Matching;
use App\Models\Seeker;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/







Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){



    Route::get('/admin', function () {
        $matchings = Matching::with(['seeker','provider'])->get();
        return view('admin.index',compact('matchings'));
    })->name('admin.index')->middleware('auth');

    Route::get('/', function () {
        $foods = Food::all();
        $cities = City::all();
        $seeker = Seeker::first();

        return view('index',compact('cities','foods'));
    })->name('home');


    Route::get('/cities',[CitiesController::class,'index'])->name('cities')->middleware('auth');;
    Route::get('/cities/create',[CitiesController::class,'create'])->name('cities.create')->middleware('auth');;
    Route::post('/cities/create',[CitiesController::class,'store'])->name('cities.store')->middleware('auth');;

    Route::get('/foods',[FoodsController::class,'index'])->name('foods')->middleware('auth');;
    Route::get('/foods/create',[FoodsController::class,'create'])->name('foods.create')->middleware('auth');;
    Route::post('/foods/create',[FoodsController::class,'store'])->name('foods.store')->middleware('auth');;
    Route::post('/matching',[MatchingController::class,'match'])->name('match')->middleware('auth');;

    Route::post('/provider/store',[SubmissionController::class,'provider'])->name('provider.store');
    Route::post('/seeker/store',[SubmissionController::class,'seeker'])->name('seeker.store');

    Route::get('/seekers',[SubmissionController::class,'all_seekers'])->name('seekers');
    Route::get('/providers',[SubmissionController::class,'all_providers'])->name('providers');


    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store'])->name('login.store');
    Route::post('/logout', [SessionController::class, 'destroy']);

});
