<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
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

Route::get('/',[HomeController::class,'index']);
Route::get('/home',[HomeController::class,'redirect']);

//****************************************************/
//LOGIN and REGISTER Routes
Route::get('/login', function () {
    return view('auth\login');
})->name('login');
Route::get('/register', function () {
    return view('auth\register');
})->name('register');

//****************************************************/
//ADMIN -DOCTORS**************************************/
Route::get('/add_doctor_view',[AdminController::class,'addview']);
Route::get('/showdoctor',[AdminController::class,'showdoctor']);
Route::get('/deletedoctor/{id}',[AdminController::class,'deletedoctor']);
Route::get('/updatedoctor/{id}',[AdminController::class,'updatedoctor']);
Route::post('/editdoctor/{id}',[AdminController::class,'editdoctor']);
Route::post('/upload_doctor',[AdminController::class,'upload']);
//ADMIN -APPOINTMENTS*********************************/
Route::get('/showappointment',[AdminController::class,'showappointment']);
Route::get('/approved/{id}',[AdminController::class,'approved']);
Route::get('/canceled/{id}',[AdminController::class,'canceled']);

//****************************************************/
//USER -APPOINTMENTS
Route::post('/appointment',[HomeController::class,'appointment']);
Route::get('/myappointment',[HomeController::class,'myappointment']);
Route::get('/cancel_appoint/{id}',[HomeController::class,'cancel_appoint']);
//****************************************************/
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//****************************************************/
//EXCEL ROUTES
Route::get('file-import-export', [AppointmentController::class, 'fileImportExport']);
Route::post('file-import', [AppointmentController::class, 'fileImport'])->name('file-import');
Route::get('file-export', [AppointmentController::class, 'fileExport'])->name('file-export');