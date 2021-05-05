<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\settingsController;
use App\Http\Controllers\companyController;
use App\Http\Controllers\customFieldController;
use App\Http\Controllers\branchController;
use App\Http\Controllers\minimumWageController;
use App\Http\Controllers\departmentController;
use App\Http\Controllers\costCenterController;
use App\Http\Controllers\sssController;
use App\Http\Controllers\philhealthController;
use App\Http\Controllers\taxController;
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
    //HOME
    Route::get('/', [indexController::class, 'index'])->name('home');
    
    //SETTINGS
    Route::get('/system-setup', [settingsController::class, 'index'])->name('settings');
    Route::post('/system-setup', [settingsController::class, 'update'])->name('settings.post');
    
    //Company
    Route::get('/company', [companyController::class, 'index'])->name('company');
    Route::post('/company', [companyController::class, 'update'])->name('company.post');
    Route::post('/company-add', [companyController::class, 'add'])->name('company.add');
    
    //Branch
    Route::get('/branch', [branchController::class, 'index'])->name('branch');
    Route::post('/branch', [branchController::class, 'update'])->name('branch.post');
    Route::post('/branch-add', [branchController::class, 'add'])->name('branch.add');

    //Department
    Route::get('/department', [departmentController::class, 'index'])->name('department');
    Route::post('/department', [departmentController::class, 'update'])->name('department.post');
    Route::post('/department-add', [departmentController::class, 'add'])->name('department.add');
    
    //SSS
    Route::get('/sss', [sssController::class, 'index'])->name('sss');
    Route::post('/sss', [sssController::class, 'update'])->name('sss.post');
    Route::post('/sss-add', [sssController::class, 'add'])->name('sss.add');

    //philhealth
    Route::get('/philhealth', [philhealthController::class, 'index'])->name('philhealth');
    Route::post('/philhealth', [philhealthController::class, 'update'])->name('philhealth.post');
    Route::post('/philhealth-add', [philhealthController::class, 'add'])->name('philhealth.add');

    //tax classification and rate
    Route::get('/tax', [taxController::class, 'index'])->name('tax');
    Route::post('/tax', [taxController::class, 'update'])->name('tax.post');
    Route::post('/tax-add', [taxController::class, 'add'])->name('tax.add');
    Route::get('/tax-rate', [taxController::class, 'index_rate'])->name('tax-rate');
    Route::post('/tax-rate', [taxController::class, 'update_rate'])->name('tax-rate.post');
    Route::post('/tax-rate-add', [taxController::class, 'add_rate'])->name('tax-rate.add');
    
    //Cost Centers
    Route::get('/cost-center', [costCenterController::class, 'index'])->name('cost');
    Route::post('/cost-center', [costCenterController::class, 'update'])->name('cost.post');
    Route::post('/cost-center-add', [costCenterController::class, 'add'])->name('cost.add');

    //Minimum Wage
    Route::get('/minimum-wage', [minimumWageController::class, 'index'])->name('wage');
    Route::post('/minimum-wage', [minimumWageController::class, 'update'])->name('wage.post');
    Route::post('/minimum-wage-add', [minimumWageController::class, 'add'])->name('wage.add');
    
    //LOGIN
    Route::get('/login', [loginController::class, 'index'])->name('login.get');
    Route::post('/login', [loginController::class, 'view'])->name('login');  
   
    //LOGOUT
    Route::get('/logout', [loginController::class, 'logout'])->name('logout');

    //Custom Field
    Route::post('/custom_field', [customFieldController::class, 'update'])->name('custom_field.post'); 

