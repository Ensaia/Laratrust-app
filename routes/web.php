<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Helpers\Alert;

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider and all of them will
 * | be assigned to the "web" middleware group. Make something great!
 * |
 */

Route::get('/laratrust', function () {
return Alert::danger('this is a message');
});


Route::middleware([
    'auth',
    'verified'
])->group(function () {
//    Route::get('/',[App\Http\Controllers\HomeController::class,'index'])->name('indexPage');
//    Route::get('/profile',[App\Http\Controllers\HomeController::class,'profile'])->name('profile');
//    Route::view('home', 'home')->name('home');
    Route::controller(\App\Http\Controllers\HomeController::class)->group(function () {
        Route::get('/', 'index')->name('indexPage');
        Route::get('/profile', 'profile')->name('profile');
    });
    Route::controller(App\Http\Controllers\UserController::class)->group(function () {
        Route::get('/users', 'index')->name('usersIndex')->middleware(['role:super-admin']);
        // Route::get('/user/create', 'create')->name('userCreate')->middleware(['role:super-admin']);
        // Route::get('/user/edit/{id}', 'edit')->name('userEdit');
        // Route::post('/user/store', 'store')->name('userStore');
        Route::put('/user/update/{id}', 'update')->name('userUpdate');
        Route::delete('/user/destroy/{id}', 'destroy')->name('userDestroy');
    });
    Route::controller(App\Http\Controllers\UserRoleController::class)->group(function () {
        Route::get('/user/{id}/roles', 'index')->name('userRolesIndex')->middleware(['role:super-admin']);
        Route::get('/user/attach/role', 'create')->name('attachUserRole')->middleware(['role:super-admin']);
        Route::post('/user/attach/role/store', 'store')->name('attachUserRoleStore');
        Route::post('/user/{id}/detach-role', 'destroy')->name('detachRole');
    });
    Route::controller(App\Http\Controllers\UserPermissionController::class)->group(function () {
        Route::get('/user/{id}/permissions', 'index')->name('userPermissionsIndex')->middleware(['role:super-admin']);
        Route::get('/user/attach/permission', 'create')->name('attachUserPermission')->middleware(['role:super-admin']);
        Route::post('/user/attach/permission/store', 'store')->name('attachUserPermissionStore');
        Route::post('/user/{id}/detach-permission', 'destroy')->name('detachPermission');
    });
    Route::controller(App\Http\Controllers\PostController::class)->group(function () {
        Route::get('/posts', 'index')->name('postsIndex');
        Route::get('/post/create', 'create')->name('postCreate')->middleware(['role:owner|admin|super-admin']);
        Route::get('/post/edit/{id}', 'edit')->name('postEdit')->middleware(['role:owner|admin|super-admin']);
        Route::post('/post/store', 'store')->name('postStore')->middleware(['role:owner|admin|super-admin']);
        Route::put('/post/update/{id}', 'update')->name('postUpdate')->middleware(['role:owner|admin|super-admin']);
        Route::delete('/post/destroy/{id}', 'destroy')->name('postDestroy')->middleware(['role:owner|admin|super-admin']);
    });
    Route::controller(App\Http\Controllers\PermissionController::class)->group(function () {
        Route::get('/permissions', 'index')->name('permissionsIndex')->middleware(['role:super-admin']);
        Route::get('/permission/create', 'create')->name('permissionCreate')->middleware(['role:super-admin']);
        Route::get('/permission/edit/{id}', 'edit')->name('permissionEdit')->middleware(['role:super-admin']);
        Route::post('/permission/store', 'store')->name('permissionStore');
        Route::put('/permission/update/{id}', 'update')->name('permissionUpdate');
        Route::delete('/permission/destroy/{id}', 'destroy')->name('permissionDestroy');
    });
    Route::controller(App\Http\Controllers\RoleController::class)->group(function () {
        Route::get('/roles', 'index')->name('rolesIndex')->middleware(['role:super-admin']);
        Route::get('/role/create', 'create')->name('roleCreate')->middleware(['role:super-admin']);
        Route::get('/role/edit/{id}', 'edit')->name('roleEdit')->middleware(['role:super-admin']);
        Route::post('/role/store', 'store')->name('roleStore');
        Route::put('/role/update/{id}', 'update')->name('roleUpdate');
        Route::delete('/role/destroy/{id}', 'destroy')->name('roleDestroy');
    });
    Route::controller(App\Http\Controllers\RolePermissionController::class)->group(function () {
        Route::get('/role/{id}/permissions', 'index')->name('rolePermissionsIndex')->middleware(['role:super-admin']);
        Route::get('/role/attach/permission', 'create')->name('roleAttachPermission')->middleware(['role:super-admin']);
        Route::post('/role/attach/permission/store', 'store')->name('roleAttachPermissionStore');
        Route::post('/role/detach/permission', 'destroy')->name('roleDetachPermission');
    });
});
