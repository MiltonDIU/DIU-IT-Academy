<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\AuditLogsController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\Admin\MenusController;
use App\Http\Controllers\Admin\ArticleCategoryController;
use App\Http\Controllers\Admin\ArticlesController;

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

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }
    return redirect()->route('admin.home');
});




Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resources([
        'positions' => PositionController::class,
        'menus' => MenusController::class,
        'article-categories' => ArticleCategoryController::class,
        'articles' => ArticlesController::class,
    ]);



    // Permissions
    Route::delete('permissions/destroy', [PermissionsController::class,'massDestroy'])->name('permissions.massDestroy');
    Route::resource('permissions', PermissionsController::class);

    // Roles
    Route::delete('roles/destroy', [RolesController::class, 'massDestroy'])->name('roles.massDestroy');
    Route::resource('roles', RolesController::class);

    // Users
    Route::delete('users/destroy', [UsersController::class,'massDestroy'])->name('users.massDestroy');
    Route::resource('users', UsersController::class);

    // Audit Logs
    Route::resource('audit-logs', AuditLogsController::class, ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    //    Route::resources(['permissions' => SettingsController::class],['except' => ['create', 'store', 'show', 'destroy']]);
    Route::post('settings/media', [SettingsController::class, 'storeMedia'])->name('settings.storeMedia');
    Route::post('settings/ckmedia', [SettingsController::class, 'storeCKEditorImages'])->name('settings.storeCKEditorImages');
    Route::get('settings', [SettingsController::class, 'edit'])->name('settings.edit');
    Route::put('settings', [SettingsController::class, 'update'])->name('settings.update');



    // Article Category
    Route::delete('article-categories/destroy', [ArticleCategoryController::class, 'massDestroy'])->name('article-categories.massDestroy');

    // Articles
    Route::delete('articles/destroy', [ArticlesController::class, 'massDestroy'])->name('articles.massDestroy');
    Route::post('articles/media', [ArticlesController::class, 'storeMedia'])->name('articles.storeMedia');
    Route::post('articles/ckmedia', [ArticlesController::class, 'storeCKEditorImages'])->name('articles.storeCKEditorImages');

    // Position
    Route::delete('positions/destroy', [PositionController::class, 'massDestroy'])->name('positions.massDestroy');
    Route::post('positions/media', [PositionController::class, 'storeMedia'])->name('positions.storeMedia');
    Route::post('positions/ckmedia', [PositionController::class, 'storeCKEditorImages'])->name('positions.storeCKEditorImages');
    // Menus
    Route::delete('menus/destroy', [MenusController::class, 'massDestroy'])->name('menus.massDestroy');
});


Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', [ChangePasswordController::class,'edit'])->name('password.edit');
        Route::post('password', [ChangePasswordController::class,'update'])->name('password.update');
        Route::post('profile', [ChangePasswordController::class,'updateProfile'])->name('password.updateProfile');
        Route::post('profile/destroy', [ChangePasswordController::class,'destroy'])->name('password.destroyProfile');


        Route::get('/edit',[ProfileController::class,'edit'])->name('edit');
        Route::post('/edit',[ProfileController::class,'updateProfile'])->name('updateProfile');


    }

});








Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
