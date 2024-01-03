<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\DriveController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\addEventController;
use App\Models\headFolder;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider withi   n a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',[loginController::class,'Mylogin'])->name('fromLogin')->middleware('guest');
Route::post('/login',[loginController::class,'Ceklogin']);
Route::get('/logout',[loginController::class,'logout']);
Route::get('/register',[loginController::class,'register']);
Route::post('/Cregister',[loginController::class,'Cregister']);
Route::get('/suksesregister',[loginController::class,'suksesregister']);

Route::get('/dashboard',[dashboardController::class,'index'])->middleware('auth')->name('dashboard');
// create headFolder
Route::post('/createDrive',[DriveController::class,'add'])->middleware('auth');;
// link all folder
Route::get('/home/{name}/{id}',[DriveController::class,'data'])->middleware('auth')->name('folders.a');

// folder Public
Route::post('/aksi/renameDrive',[DriveController::class,'renameDrive'])->middleware('auth');
Route::post('/createFolder',[DriveController::class,'addFolder'])->middleware('auth');
// Route::get('/home/{masterFolder}/{folderName}/{id}',[DriveController::class,'showFolder'])->middleware('auth');;

Route::get('/personal/{id}',[PersonalController::class,'index'])->middleware('auth')->name('personal');
Route::get('/personal/{nameFolder}/{id}',[PersonalController::class,'folders'])->middleware('auth');

// Aksi Update dan Delete All
Route::post('/aksi/RenameFolder',[PersonalController::class,'UpdateFolder'])->middleware('auth');
Route::get('/aksi/DeleteFolder/{id}',[PersonalController::class,'DeleteFolder'])->middleware('auth');
Route::post('/aksi/Deletefile',[PersonalController::class,'fileDelete'])->middleware('auth');
Route::post('/aksi/uploadFile',[PersonalController::class,'UploadFile'])->middleware('auth');
Route::post('/aksi/renameFile',[PersonalController::class,'renameFile'])->middleware('auth');
Route::post('/aksi/embedVideo',[PersonalController::class,'embedVideo'])->middleware('auth');
Route::post('/aksi/driveHapus',[PersonalController::class,'driveHapus'])->middleware('auth');


Route::get('/aksi/pdfview/{nameFolder}/{id}',[PersonalController::class,'pdfview'])->middleware('auth');
Route::get('/aksi/docview/{nameFolder}/{id}',[PersonalController::class,'docview'])->middleware('auth');
Route::get('/trash',[PersonalController::class,'trash'])->middleware('auth');
Route::post('/addEvent',[addEventController::class,'addEvent'])->middleware('auth');
Route::post('/updateEvent',[addEventController::class,'updateEvent'])->middleware('auth');
Route::post('/deleteEvent',[addEventController::class,'deleteEvent'])->middleware('auth');




// Clear application cache:
Route::get('/clean', function() {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
   Artisan::call('route:clear');
   Artisan::call('view:clear');
   return 'Application cache has been cleared';
});