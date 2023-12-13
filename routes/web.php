<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CmsController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => '/admin'], function () {

    Route::group(['middleware' => ['admin']], function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('dashboard', 'dashboard')->name('admin.index');
            Route::get('logout', 'logout')->name('admin.logout');
            // password
            Route::match(['get', 'post'],'update-password', 'updatePassword')->name('admin.update.password');
            Route::match(['get', 'post'],'update-detail', 'updateAdminDetail')->name('admin.update.adminDetails');
            Route::post('check-current-password', 'checkCurrentPassword')->name('admin.checkCurrent.password');
            // subadmin
            Route::get('subadmin', 'subadmin')->name('admin.subadmin');
            Route::post('update-subadmin-status', 'SubAdminStatus' );
            Route::get('delete-subadmin/{id?}', 'Subadmindestroy');
            Route::match(['get','post'], 'add-edit-subadmin/{id?}', 'addedit_subadmin')->name('admin-addedit-subadmin');
            Route::match(['get','post'], 'update-role/{id?}', 'updateRoles')->name('admin-updateRoles');


        });
        // Cms pages
        Route::controller(CmsController::class)->group(function(){
            Route::get('cms-pages', 'index')->name('admin.cmspages');
            Route::post('update-cms-pages-status', 'update')->name('admin.cmspages.update');
            Route::match(['get','post'], 'add-edit-cms-pages/{id?}', 'edit')->name('admin-addedit-cms-page');
            Route::get('delete-cms-pages/{id?}', 'destroy');
        });
    });
    // login
    Route::controller(AdminController::class)->group(function () {
        Route::match(['get', 'post'], 'login', 'login')->name('admin.login');
    });
});
