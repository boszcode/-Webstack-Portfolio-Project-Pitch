<?php

use Illuminate\Support\Facades\Route;
//Route
Route::get('/', function () {
    if(\Illuminate\Support\Facades\Auth::check()){
        if(\Illuminate\Support\Facades\Auth::user()->role=='admin')
            return redirect(\route('users.index'));
        if (\Illuminate\Support\Facades\Auth::user()->role=='manager')
            return redirect(\route('service.index'));
    }
    return view('welcome');
})->name('home');

//Route for user
Route::get('users','\App\Http\Controllers\UserController@all_users')->name('users.index');
Route::get('users/create','\App\Http\Controllers\UserController@create')->name('users.create');
Route::post('users/store','\App\Http\Controllers\UserController@store')->name('users.store');
Route::delete('users/{user}/destroy','\App\Http\Controllers\UserController@destroy')->name('users.destroy');

//Route for profile
Route::get('profile/show','\App\Http\Controllers\ProfileController@show')->name('profile.show');
Route::get('profile/edit','\App\Http\Controllers\ProfileController@edit')->name('profile.edit');
Route::post('profile/update','\App\Actions\Fortify\UpdateUserPassword@update_profile')->name('profile.update');

//Route for hotels
Route::get('hotels','\App\Http\Controllers\HotelController@all_hotels')->name('hotels.index');
Route::get('hotels/create','\App\Http\Controllers\HotelController@create')->name('hotels.create');
Route::get('hotels/{hotel}/edit','\App\Http\Controllers\HotelController@edit')->name('hotels.edit');
Route::get('hotels/{hotel}/show','\App\Http\Controllers\HotelController@show')->name('hotels.show');
Route::post('hotels/{hotel}/update','\App\Http\Controllers\HotelController@update')->name('hotels.update');
Route::post('hotels/store','\App\Http\Controllers\HotelController@store')->name('hotels.store');
Route::delete('hotels/{hotel}/destroy','\App\Http\Controllers\HotelController@destroy')->name('hotels.destroy');

//Route for Manager
Route::get('service/','\App\Http\Controllers\HotelServiceController@index')->name('service.index');
Route::get('service/{hotel}/create','\App\Http\Controllers\HotelServiceController@create')->name('service.create');
Route::post('service/{hotel}/store','\App\Http\Controllers\HotelServiceController@store')->name('service.store');
Route::get('service/{hotel}/{service}/show','\App\Http\Controllers\HotelServiceController@show')->name('service.show');
Route::get('service/{hotel}/{service}/edit','\App\Http\Controllers\HotelServiceController@edit')->name('service.edit');
Route::post('service/{hotel}/{service}/update','\App\Http\Controllers\HotelServiceController@update')->name('service.update');
Route::delete('service/{hotel}/{service}/destroy','\App\Http\Controllers\HotelServiceController@destroy')->name('service.destroy');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect('/');
})->name('dashboard');
