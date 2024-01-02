<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

use App\Mail\succesfulregistration;

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

Route::get('/', function () {
    $user = \App\Models\User::find(6);
    //Mail::to($user->email)->send(new succesfulregistration($user));
    \App\Jobs\mailjob::dispatch($user);
    return view('welcome');
    //dd($user);
});
