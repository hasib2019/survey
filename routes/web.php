<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ElectionSurveyController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ExcelController;
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
    return view('auth/login');
});
Auth::routes();
// cache clear
Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');
    return "Cleared!";
});
Route::get('/home', [HomeController::class, 'index'])->name('home');
// super admin section 
Route::group(['prefix' => 'super-admin', 'middleware' => 'is_admin'], function () {
    Route::get('dashboard', [HomeController::class, 'adminHome'])->name('admin.dashboard');
    Route::get('/survey', [ElectionSurveyController::class, 'create'])->name('admin.survay.create');
    Route::post('/survey/create', [ElectionSurveyController::class, 'store'])->name('admin.survay');
    Route::get('/survey/edit/{id}', [ElectionSurveyController::class, 'edit'])->name('benEdit');
    Route::post('/survey/update', [ElectionSurveyController::class, 'update'])->name('admin.survay.edit');
    Route::get('/survey/delete/{id}', [ElectionSurveyController::class, 'destroy'])->name('benDelete');
    Route::get('/survey/archive/{id}', [ElectionSurveyController::class, 'benArchive'])->name('benArchive');
    // recovery 
    Route::get('/survey/deleteed-data/{id}', [ElectionSurveyController::class, 'DeleteData'])->name('admin.delete.recovery');
    Route::get('/survey/delete-recover/{id}', [ElectionSurveyController::class, 'RecoverDelete'])->name('recoverDelete');

    Route::get('/survey/archive-data/{id}', [ElectionSurveyController::class, 'ArchiveData'])->name('admin.archive.recovery');
    Route::get('/survey/archive-recover/{id}', [ElectionSurveyController::class, 'RecoverArchive'])->name('recoverArchive');



    Route::get('/all-village', [ElectionSurveyController::class, 'all_village'])->name('admin.all-village');
    Route::get('/add-village', [ElectionSurveyController::class, 'add_village'])->name('admin.add-village');
    Route::post('/village_add', [ElectionSurveyController::class, 'village_add'])->name('admin.village_add');
    Route::get('/edit-village/{id}', [ElectionSurveyController::class, 'edit_village'])->name('admin.edit-village');
    Route::post('/village-update', [ElectionSurveyController::class, 'village_update'])->name('admin.village_update');

    // report 
    Route::get('/all_beneficiaries', [ElectionSurveyController::class, 'all_beneficiaries'])->name('admin.all_beneficiaries');
    Route::get('/village-beneficiaries', [ElectionSurveyController::class, 'village_beneficiaries'])->name('admin.village_list');
    Route::get('/village-beneficiaries-result', [ElectionSurveyController::class, 'village_beneficiaries_search'])->name('admin.village.serch');
    // union result 
    Route::get('/union-beneficiaries', [ElectionSurveyController::class, 'union_beneficiaries'])->name('admin.union_list');
    Route::get('/union-beneficiaries-result', [ElectionSurveyController::class, 'union_beneficiaries_search'])->name('admin.union.serch');
    // disadvantaged result 
    Route::get('/disadvantaged-beneficiaries', [ElectionSurveyController::class, 'disadvantaged_beneficiaries'])->name('admin.dis_list');

    Route::get('/disadvantaged-beneficiaries-result', [ElectionSurveyController::class, 'disadvantaged_beneficiaries_search'])->name('admin.dis_list.serch');
    // male result 
    Route::get('/male-beneficiaries', [ElectionSurveyController::class, 'male_beneficiaries'])->name('admin.male_list');
    Route::get('/female-beneficiaries', [ElectionSurveyController::class, 'female_beneficiaries'])->name('admin.female_list');

    Route::get('/user-view', [HomeController::class, 'viewUser'])->name('view.user');
    Route::get('/add-user', [HomeController::class, 'add_user'])->name('add.user');
    Route::post('/user-create', [HomeController::class, 'userCreate'])->name('add.user.create');
});

// admin section 
Route::group(['prefix' => 'admin', 'middleware' => 'is_merchant'], function () {
    Route::get('/dashboard', [HomeController::class, 'merchantHome'])->name('merchant.dashboard');
    Route::get('/survey', [ElectionSurveyController::class, 'create'])->name('survay.create');
    Route::post('/survey/create', [ElectionSurveyController::class, 'store'])->name('survay');
    Route::get('/all-village', [ElectionSurveyController::class, 'all_village'])->name('all-village');
    Route::get('/add-village', [ElectionSurveyController::class, 'add_village'])->name('add-village');
    Route::get('/edit-village/{id}', [ElectionSurveyController::class, 'edit_village'])->name('edit-village');
    Route::post('/village_add', [ElectionSurveyController::class, 'village_add'])->name('village_add');
    Route::post('/village-update', [ElectionSurveyController::class, 'village_update'])->name('village_update');

    // report 
    Route::get('/all_beneficiaries', [ElectionSurveyController::class, 'all_beneficiaries'])->name('all_beneficiaries');
    Route::get('/village-beneficiaries', [ElectionSurveyController::class, 'village_beneficiaries'])->name('village_list');
    Route::get('/village-beneficiaries-result', [ElectionSurveyController::class, 'village_beneficiaries_search'])->name('village.serch');
    // union result 
    Route::get('/union-beneficiaries', [ElectionSurveyController::class, 'union_beneficiaries'])->name('union_list');
    Route::get('/union-beneficiaries-result', [ElectionSurveyController::class, 'union_beneficiaries_search'])->name('union.serch');
    // disadvantaged result 
    Route::get('/disadvantaged-beneficiaries', [ElectionSurveyController::class, 'disadvantaged_beneficiaries'])->name('dis_list');
    Route::get('/disadvantaged-beneficiaries-result', [ElectionSurveyController::class, 'disadvantaged_beneficiaries_search'])->name('dis_list.serch');
    // male result 
    Route::get('/male-beneficiaries', [ElectionSurveyController::class, 'male_beneficiaries'])->name('male_list');
    Route::get('/female-beneficiaries', [ElectionSurveyController::class, 'female_beneficiaries'])->name('female_list');
});

// user section 
Route::group(['prefix' => 'user', 'middleware' => 'IsUser'], function () {
    Route::get('/dashboard', [HomeController::class, 'userHome'])->name('user.dashboard');

    // report 
    Route::get('/all_beneficiaries', [ElectionSurveyController::class, 'all_beneficiaries'])->name('user.all_beneficiaries');
    Route::get('/village-beneficiaries', [ElectionSurveyController::class, 'village_beneficiaries'])->name('user.village_list');
    Route::get('/village-beneficiaries-result', [ElectionSurveyController::class, 'village_beneficiaries_search'])->name('user.village.serch');
    // union result 
    Route::get('/union-beneficiaries', [ElectionSurveyController::class, 'union_beneficiaries'])->name('user.union_list');
    Route::get('/union-beneficiaries-result', [ElectionSurveyController::class, 'union_beneficiaries_search'])->name('union.serch');
    // disadvantaged result 
    Route::get('/disadvantaged-beneficiaries', [ElectionSurveyController::class, 'disadvantaged_beneficiaries'])->name('user.dis_list');
    Route::get('/disadvantaged-beneficiaries-result', [ElectionSurveyController::class, 'disadvantaged_beneficiaries_search'])->name('user.dis_list.serch');
    // male result 
    Route::get('/male-beneficiaries', [ElectionSurveyController::class, 'male_beneficiaries'])->name('user.male_list');
    Route::get('/female-beneficiaries', [ElectionSurveyController::class, 'female_beneficiaries'])->name('user.female_list');
});

// auto select
Route::post('/district-by-division', [ElectionSurveyController::class, 'getDistrictsByDivision']);
Route::post('/upazila-by-district', [ElectionSurveyController::class, 'getUpazilaByDistrict']);
Route::post('/unions-by-upazila', [ElectionSurveyController::class, 'getUnionByUpazila']);
Route::post('/village-by-union', [ElectionSurveyController::class, 'getVillageByUnion']);
// auto select

// pdf for all user 
Route::get('generate-pdf', [PDFController::class, 'generatePDF'])->name('all-ben-pdf');
Route::get('/fun', [App\Http\Controllers\FunController::class, 'document']);

Route::get('export-all-beneficiaries', [ExcelController::class, 'exportBeneficiaries'])->name('all-ben-excel');
Route::get('export-village', [ExcelController::class, 'exportVillage'])->name('village-excel');

Route::get('/createPDF', [PDFController::class, 'createPDF']);
