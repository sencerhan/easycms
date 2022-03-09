<?php

use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\ModuleController as AdminModuleController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SliderController as AdminSliderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SliderController;
use App\Http\Middleware\PreControl;
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

Route::get('/register', [UserController::class, 'register']);
Route::post('/create_user', [UserController::class, 'createUser']);
Route::post('/dologin', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);
Route::get('/login', [UserController::class, 'index']);

Route::prefix('/admin')->middleware("role:Admin")->group(function () { 

    Route::get('/', [AdminIndexController::class, 'index']);
    
    Route::get('/settings', [SettingsController::class, 'settings'])->name("admin.settings");
    Route::post('/save_settings', [SettingsController::class, 'save'])->name("admin.settings.save"); 

    Route::get('/languages', [LanguageController::class, 'index'])->name("admin.languages");
    Route::get('/languages/add', [LanguageController::class, 'add'])->name("admin.languages.add");
    Route::get('/admin/languages/edit/{id}', [LanguageController::class, 'edit'])->name("admin.languages.edit");
    Route::post('/admin/languages/insert', [LanguageController::class, 'insert'])->name("admin.languages.insert");
    Route::post('/admin/languages/update/{id}', [LanguageController::class, 'update'])->name("admin.languages.update");
    Route::get('/admin/languages/delete/{id}', [LanguageController::class, 'delete'])->name("admin.languages.delete");

    Route::get('/pages', [AdminPageController::class, 'index'])->name("admin.pages");
    Route::get('/pages/add', [AdminPageController::class, 'add'])->name("admin.pages.add");
    Route::get('/admin/pages/edit/{id}', [AdminPageController::class, 'edit'])->name("admin.pages.edit");
    Route::post('/admin/pages/insert', [AdminPageController::class, 'insert'])->name("admin.pages.insert");
    Route::post('/admin/pages/update/{id}', [AdminPageController::class, 'update'])->name("admin.pages.update");
    Route::get('/admin/pages/delete/{id}', [AdminPageController::class, 'delete'])->name("admin.pages.delete");

    Route::get('/galleries', [AdminGalleryController::class, 'index'])->name("admin.galleries");
    Route::get('/galleries/add', [AdminGalleryController::class, 'add'])->name("admin.galleries.add");
    Route::get('/admin/galleries/edit/{id}', [AdminGalleryController::class, 'edit'])->name("admin.galleries.edit");
    Route::post('/admin/galleries/insert', [AdminGalleryController::class, 'insert'])->name("admin.galleries.insert");
    Route::post('/admin/galleries/update/{id}', [AdminGalleryController::class, 'update'])->name("admin.galleries.update");
    Route::get('/admin/galleries/delete/{id}', [AdminGalleryController::class, 'delete'])->name("admin.galleries.delete");

    Route::get('/sliders', [AdminSliderController::class, 'index'])->name("admin.sliders");
    Route::get('/sliders/add', [AdminSliderController::class, 'add'])->name("admin.sliders.add");
    Route::get('/admin/sliders/edit/{id}', [AdminSliderController::class, 'edit'])->name("admin.sliders.edit");
    Route::post('/admin/sliders/insert', [AdminSliderController::class, 'insert'])->name("admin.sliders.insert");
    Route::post('/admin/sliders/update/{id}', [AdminSliderController::class, 'update'])->name("admin.sliders.update");
    Route::get('/admin/sliders/delete/{id}', [AdminSliderController::class, 'delete'])->name("admin.sliders.delete");

    Route::get('/posts', [AdminPostController::class, 'index'])->name("admin.posts");
    Route::get('/posts/add', [AdminPostController::class, 'add'])->name("admin.posts.add");
    Route::get('/admin/posts/edit/{id}', [AdminPostController::class, 'edit'])->name("admin.posts.edit");
    Route::post('/admin/posts/insert', [AdminPostController::class, 'insert'])->name("admin.posts.insert");
    Route::post('/admin/posts/update/{id}', [AdminPostController::class, 'update'])->name("admin.posts.update");
    Route::get('/admin/posts/delete/{id}', [AdminPostController::class, 'delete'])->name("admin.posts.delete");

    
    Route::post('/module_to_page', [AdminModuleController::class, 'moduleToPage'])->name("admin.moduletopage");
    Route::post('/delete_module', [AdminModuleController::class, 'deleteModule'])->name("admin.deletemodule");
    Route::get('/post_to_page/{page_id}', [AdminModuleController::class, 'postToPage'])->name("admin.posttopage");
    Route::post('/post_to_page_save', [AdminModuleController::class, 'postToPageSave'])->name("admin.posttopagesave");
    Route::get('/gallery_to_page/{page_id}', [AdminModuleController::class, 'galleryToPage'])->name("admin.gallerytopage");
    Route::post('/gallery_to_page_save', [AdminModuleController::class, 'galleryToPageSave'])->name("admin.gallerytopagesave");
    Route::get('/slider_to_page/{page_id}', [AdminModuleController::class, 'sliderToPage'])->name("admin.slidertopage");
    Route::post('/slider_to_page_save', [AdminModuleController::class, 'sliderToPageSave'])->name("admin.slidertopagesave");
});
Route::middleware(PreControl::class)->group(function () {
    Route::get('/', [IndexController::class, 'index']);
    Route::get('{lang_code}/{slug}', [PageController::class, 'getPage']);
    Route::get('{lang}', [PageController::class, 'getPage']);
});
