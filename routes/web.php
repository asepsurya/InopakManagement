<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\DriveController;
use App\Http\Controllers\PersonalController;
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
Route::post('/aksi/renameDrive',[DriveController::class,'renameDrive']);
Route::post('/createFolder',[DriveController::class,'addFolder']);
// Route::get('/home/{masterFolder}/{folderName}/{id}',[DriveController::class,'showFolder'])->middleware('auth');;

Route::get('/personal/{id}',[PersonalController::class,'index'])->middleware('auth')->name('personal');
Route::get('/personal/{nameFolder}/{id}',[PersonalController::class,'folders'])->middleware('auth');;

// Aksi Update dan Delete All
Route::post('/aksi/RenameFolder',[PersonalController::class,'UpdateFolder']);
Route::get('/aksi/DeleteFolder/{id}',[PersonalController::class,'DeleteFolder']);
Route::post('/aksi/Deletefile',[PersonalController::class,'fileDelete']);
Route::post('/aksi/uploadFile',[PersonalController::class,'UploadFile']);
Route::post('/aksi/renameFile',[PersonalController::class,'renameFile']);
Route::post('/aksi/embedVideo',[PersonalController::class,'embedVideo']);


Route::get('/aksi/pdfview/{nameFolder}',[PersonalController::class,'pdfview']);
Route::get('/trash',[PersonalController::class,'trash']);


Route::get('/trash', function () {
    return view('trash._trash',[
        'title'=>'Trash & Recovery',
        'dataFolder'=>headFolder::all(),
       
    ]);
});
