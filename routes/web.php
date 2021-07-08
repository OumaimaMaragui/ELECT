<?php

use Illuminate\Support\Facades\Route;
use App\Events\ActualiteEvent;
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
Route::get('admin/empty', function () {
    return view('admin.empty');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/consommation', [App\Http\Controllers\ConsommationController::class, 'index'])->name('consommation');
Route::get('/actualites', [App\Http\Controllers\ActualiteController::class, 'index'])->name('actualites');
Route::get('/tableau', [App\Http\Controllers\TableauController::class, 'index'])->name('tableau');
Route::get('/mensualite', [App\Http\Controllers\MensualiteController::class, 'index'])->name('ajustement');
Route::post('/ajuster', [App\Http\Controllers\MensualiteController::class, 'ajuster'])->name('mensualite');
Route::get('/estimation', [App\Http\Controllers\EstimationController::class, 'index'])->name('estimation');
Route::get('/aide', [App\Http\Controllers\AideController::class, 'index'])->name('aide');
Route::get('/discussion', [App\Http\Controllers\DiscussionController::class, 'index'])->name('discussion');
Route::post('/aide/{id}', [App\Http\Controllers\AideController::class, 'send'])->name('send');
Route::get('/don', [App\Http\Controllers\DonController::class, 'index'])->name('don');
Route::post('/don', [App\Http\Controllers\DonController::class, 'donate'])->name('donate');

Route::get('event',function(){
    event(new ActualiteEvent('hii '));
});


Route::get('admin/home',[App\Http\Controllers\admin\AdminController::class, 'index'])->name('admin.home');
Route::post('admin/login',[App\Http\Controllers\admin\LoginController::class, 'login']);
Route::get('admin/login',[App\Http\Controllers\admin\LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/logout',[App\Http\Controllers\admin\LoginController::class ,'logout'])->name('admin.logout');
Route::get('admin/password/confirm',[App\Http\Controllers\admin\ConfirmPasswordController::class,'showConfirmForm'])->name('admin.password.confirm');
Route::post('admin/password/email',[App\Http\Controllers\admin\ForgotPasswordController::class,'sendResetLinkEmail'])->name('admin.password.email');
Route::get('admin/password/reset',[App\Http\Controllers\admin\ForgotPasswordController::class,'showLinkRequestForm'])->name('admin.password.request');
Route::post('admin/password/reset',[App\Http\Controllers\admin\ResetPasswordController::class,'reset'])->name('admin.password.update');
Route::get('admin/password/reset/{token}',[App\Http\Controllers\admin\ResetPasswordController::class,'showResetForm'])->name('admin.password.reset');
Route::post('admin/register',[App\Http\Controllers\admin\RegisterController::class,'register']);
Route::get('admin/register',[App\Http\Controllers\admin\RegisterController::class,'showRegistrationForm'])->name('admin.register');
Route::get('admin/urgente/{id}',[App\Http\Controllers\admin\UrgenteController::class,'index'])->name('admin.urgente');
Route::post('admin/urgente/{id}',[App\Http\Controllers\admin\UrgenteController::class,'send'])->name('admin.sendurgent');
Route::get('admin/information/{id}',[App\Http\Controllers\admin\UrgenteController::class,'index'])->name('admin.information');
Route::post('admin/information/{id}',[App\Http\Controllers\admin\UrgenteController::class,'send'])->name('admin.sendinfo');
Route::get('admin/reclamation/{id}',[App\Http\Controllers\admin\UrgenteController::class,'index'])->name('admin.reclamation');
Route::post('admin/reclamation/{id}',[App\Http\Controllers\admin\UrgenteController::class,'send'])->name('admin.sendreclamation');

