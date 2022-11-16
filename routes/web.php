<?php

use App\Http\Controllers\admin\AdminsAdminController;
use App\Http\Controllers\admin\AuthAdminController;
use App\Http\Controllers\admin\DashboardAdminController;
use App\Http\Controllers\admin\FormOneAdminController;
use App\Http\Controllers\admin\PermissionAdminController;
use App\Http\Controllers\admin\PlacesAdminController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\RolesAdminController;
use App\Http\Controllers\admin\UploaderAdminController;
use App\Http\Controllers\admin\UserAdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;

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
//Language rout
Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');
//Language CKEditor
Route::post('ckeditor/upload', [CKEditorController::class, "upload"])->name('ckeditor.image-upload');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['guest:admin', 'PreventBackHistory'])
        ->controller(AuthAdminController::class)
        ->group(function () {
            Route::view('/', 'index')->name('home');
            Route::get('/auth', 'index')->name('auth');
            Route::post('/login', 'login')->name('login');
            Route::post('/register', 'register')->name('register');
            Route::get('/check', 'check')->name('check');
        });

    Route::middleware(['auth:admin', 'PreventBackHistory'])
        ->controller(AuthAdminController::class)
        ->group(function () {
            Route::view('/', 'index')->name('home');
            Route::get('logout', 'logout')->name('logout');
            Route::get('account', 'account')->name('account');
            Route::post('account/update', 'update')->name('update');

            //Route::resource('roles', RoleController::class);

            Route::prefix('roles')
                ->controller(RoleController::class)
                ->group(function () {
                    Route::get('/', 'index')->name('roles');
                });

            Route::prefix('/')
                ->controller(DashboardAdminController::class)
                ->group(function () {
                    Route::get('/', 'index')->name('home');
                });

            Route::prefix('dashboard')
                ->name('dashboard')
                ->controller(DashboardAdminController::class)
                ->group(function () {
                    Route::get('/', 'index')->name('dashboard');
                });
           /* Route::prefix('admins')
                ->name('admins')
                ->controller(AdminsAdminController::class)
                ->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/getItems', 'getItems')->name('getItems');
                    Route::get('show/{id}', 'show')->name('show');
                    Route::get('create', 'create')->name('create');
                    Route::post('store', 'store')->name('store');
                    Route::get('edit/{id}', 'edit')->name('edit');
                    Route::post('update/{id}', 'update')->name('update');
                    Route::post('status/{id}', 'status')->name('status');
                    Route::get('filter/core/{id}', 'index')->name('filter');
                });*/

            Route::prefix('places')
                ->name('places')
                ->controller(PlacesAdminController::class)
                ->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/getItems', 'getItems')->name('getItems');
                    Route::get('show/{id}', 'show')->name('show');
                    Route::get('create', 'create')->name('create');
                    Route::post('store', 'store')->name('store');
                    Route::get('edit/{id}', 'edit')->name('edit')->middleware('permission:form one_edit');
                    Route::post('update/{id}', 'update')->name('update');
                    Route::post('status/{id}', 'status')->name('status');
                    Route::get('filter/core/{id}', 'index')->name('filter');
                });


            Route::prefix('form_one')
                ->name('form_one')
                ->controller(FormOneAdminController::class)
                ->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/getItems', 'getItems')->name('getItems');
                    Route::get('show/{id}', 'show')->name('show')->middleware('permission:form one_view');
                    Route::get('create', 'create')->name('create')->middleware('permission:form one_create');
                    Route::post('store', 'store')->name('store');
                    Route::get('edit/{id}', 'edit')->name('edit')->middleware('permission:form one_edit');
                    Route::post('update/{id}', 'update')->name('update');
                    Route::post('status/{id}', 'status')->name('status');
                    Route::get('filter/core/{id}', 'index')->name('filter');
                });

            Route::prefix('upload')
                ->name('upload')
                ->controller(UploaderAdminController::class)
                ->group(function () {
                    Route::post('/image', 'index')->name('image');
                });

            Route::prefix('admins')
                ->name('admins')
                ->controller(UserAdminController::class)
                ->group(function () {
                    Route::get('/', 'index')->name('  ');
                    Route::get('edit/{id}', 'edit')->name('edit');
                    Route::get('show/{id}', 'show')->name('show');
                    Route::post('update/{id}', 'update')->name('update');
                    Route::post('store', 'store')->name('store');
                    Route::delete('delete/{id}', 'destroy')->name('delete');
                    Route::get('roles', 'roles')->name('roles');
                    Route::get('roles/view/{id}', 'roles_view')->name('roles.view');
                    Route::get('roles/edit/{id}', 'roles_edit')->name('roles.edit');
                    Route::get('permissions', 'permissions')->name('permissions');
                });


            Route::prefix('users-roles')
                ->name('users-roles')
                ->controller(RolesAdminController::class)
                ->group(function () {
                    Route::get('/', 'index')->name('roles');
                    Route::get('edit/{id}', 'edit')->name('edit');
                    Route::get('show/{id}', 'show')->name('show');
                    Route::post('update/{id}', 'update')->name('update');
                    Route::post('store', 'store')->name('store');
                    Route::delete('delete/{id}', 'destroy')->name('delete');
                    Route::delete('delete/{role}/user/{user}', 'destroy_user')->name('delete');
                });

            Route::prefix('users-permissions')
                ->name('users-permissions')
                ->controller(PermissionAdminController::class)
                ->group(function () {
                    Route::get('/', 'index')->name('permissions');
                    Route::get('/edit/{id}', 'edit')->name('edit');
                    Route::get('show/{id}', 'show')->name('show');
                    Route::post('update/{id}', 'update')->name('update');
                    Route::post('store', 'store')->name('store');
                    Route::delete('delete/{id}', 'destroy')->name('delete');//->middleware('role')
                });
        });
});

Route::prefix('/')
    ->name('wlc')
    ->controller(DashboardAdminController::class)
    ->group(function () {
        Route::get('/', 'index')->name('home');
    });
/*Route::get('/', function () {
    return view('welcome');
});*/
//Start Site Routs
Route::prefix('user')->name('user.')->group(function () {
    Route::middleware(['guest:web', 'PreventBackHistory'])
        ->controller(AuthController::class)
        ->group(function () {
            Route::get('auth', 'index')->name('auth');
            Route::post('login', 'login')->name('login');
            Route::post('register', 'register')->name('register');
            Route::get('check', 'check')->name('check');
            Route::post('redirect', 'redirect')->name('redirect');
        });
    Route::middleware(['auth:web', 'PreventBackHistory'])
        ->controller(AuthController::class)
        ->group(function () {
            Route::get('home', [DashboardAdminController::class, 'index'])->name('index');
            Route::post('logout', 'logout')->name('logout');
            Route::get('sign-out', 'logout')->name('sign-out');
            Route::get('account', 'account')->name('account');
            Route::post('account/edit/profile/{id}', 'edit_profile')->name('edit.profile');
            Route::post('account/edit/password/{id}', 'edit_password')->name('edit.password');
            Route::get('order/{id}', 'order')->name('order');
            Route::post('order/reorder/{id}', 'reorder')->name('reorder');
        });
});

