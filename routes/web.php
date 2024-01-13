<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\userResource;  
use Illuminate\Support\Facades\Hash;
use App\Mail\succesfulregistration;
use Illuminate\Support\Facades\Redirect;
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
Route::get('/', [ \App\Http\Controllers\Controller::class,'pollenUnit']);
Route::post('/pollenPage', [ \App\Http\Controllers\Controller::class,'pollenUnitPost'])->name('pollenunitpage');
Route::get('/localGovt', [ \App\Http\Controllers\Controller::class,'localGovt'])->name('localGovt');
Route::post('/localGovt', [ \App\Http\Controllers\Controller::class,'localGovtPost'])->name('localGovtPost');
Route::get('/newPollenUnitVote', [ \App\Http\Controllers\Controller::class,'newPollenUnitVote'])->name('newPollenUnit');
Route::post('/newPollenUnitVote', [ \App\Http\Controllers\Controller::class,'newPollenUnitVotePOst'])->name('newPollenUnitPost');