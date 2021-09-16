<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\homeController;
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
define('PAGINATION_COUNT','10');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

/*
 * Route::get('/get',[AdminControoler::class,'index']);
 */
Route::group(['prefix'=>'adminCp'],function(){
    Route::get('index',[AdminController::class,'index'])->name('admin.index');
    ############ Articl ################
    Route::get('articl',[AdminController::class,'articl'])->name('admin.articl');
    Route::get('addarticl',[AdminController::class,'addarticl'])->name('add.articl');
    Route::post('articlstor',[AdminController::class,'articlstor'])->name('articlstor');

    Route::get('articledit/{ref}/{user_id}',[AdminController::class,'articledit'])->name('articledit');
    Route::post('editarticlstor',[AdminController::class,'editarticlstor'])->name('editarticlstor');

    Route::post('deletarticl',[AdminController::class,'deletarticl'])->name('deletarticl');

    ############ category ################
    Route::get('category',[AdminController::class,'category'])->name('admin.category');
    Route::get('addcategory',[AdminController::class,'addcategory'])->name('add.category');
    Route::post('categorystor',[AdminController::class,'categorystor'])->name('stor.category');

    Route::get('editcategory/{link}',[AdminController::class,'editcategory'])->name('editcategory');
    Route::post('editcategorystor',[AdminController::class,'editcategorystor'])->name('editcategorystor');


    ############ comment ################
    Route::get('comment',[AdminController::class,'comment'])->name('admin.comment');
    Route::post('commentcheck',[AdminController::class,'commentcheck'])->name('commentcheck');

    ############ users ################
    Route::get('users',[AdminController::class,'users'])->name('admin.users');
    Route::get('usersupdate/{id}',[AdminController::class,'usersupdate'])->name('update.users');
    Route::post('usersupdatestr',[AdminController::class,'usersupdatestr'])->name('usersupdatestr');

    Route::post('deletcomment',[AdminController::class,'deletcomment'])->name('deletcomment');

});

########################################## home ##########################################

Route::get('/',[homeController::class,'index'])->name('wel');

Route::get('/contact',[homeController::class,'contact'])->name('contact.index');

Route::get('blog',[homeController::class,'indexblog'])->name('blog.idex');
Route::get('blogdetail/{ref}',[homeController::class,'blogdetail'])->name('blog.detail');


Route::get('categories',[homeController::class,'categories'])->name('cate.detail');
Route::get('categories-blog/{ref}',[homeController::class,'categoriesbost'])->name('cate.post');

                        ############  add comment ############
Route::post('addcomment',[homeController::class,'addcomment'])->name('add.comment');
                        ############  add comment ############

########################################## home ##########################################
