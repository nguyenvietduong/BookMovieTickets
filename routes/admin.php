<?php

// use App\Http\Controllers\Backend\CategoryController;

use App\Http\Controllers\Backend\ActorController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DiscountController;
use App\Http\Controllers\Backend\MovieController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\ScreenController;
use App\Http\Controllers\Backend\SeatController;
use App\Http\Controllers\Backend\ShowTimeController;
use App\Http\Controllers\Backend\SystemController;
use App\Http\Controllers\Backend\User\UserController;
// use App\Http\Controllers\Backend\User\EditorController;
// use App\Http\Controllers\Backend\User\AdminController;
// use App\Http\Controllers\Backend\PostController;

// use App\Http\Controllers\Backend\SystemController;

use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\Backend\ArticleController;
// use App\Http\Controllers\Backend\CommentController;
// use App\Http\Controllers\Backend\TagController;

Route::prefix('admin')
    // ->middleware()
    ->group(function () {
        Route::get('',                      [DashboardController::class, 'index'])->name('dashboard.index');

        Route::group(['prefix' => 'user'], function () {
            Route::get('index',             [UserController::class, 'index'])->name('user.index');
            Route::get('create',            [UserController::class, 'create'])->name('user.create');
            Route::post('store',            [UserController::class, 'store'])->name('user.store');
            Route::get('{id}/edit',         [UserController::class, 'edit'])->where(['id' => '[0-9]+'])->name('user.edit');
            Route::post('{id}/update',      [UserController::class, 'update'])->where(['id' => '[0-9]+'])->name('user.update');
            Route::get('{id}/delete',       [UserController::class, 'delete'])->where(['id' => '[0-9]+'])->name('user.delete');
            Route::delete('{id}/destroy',   [UserController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('user.destroy');
        });

        // Route::group(['prefix' => 'editor'], function () {
        //     Route::get('index',             [EditorController::class, 'index'])->name('editor.index');
        //     Route::get('create',            [EditorController::class, 'create'])->name('editor.create');
        //     Route::post('store',            [EditorController::class, 'store'])->name('editor.store');
        //     Route::get('{id}/edit',         [EditorController::class, 'edit'])->where(['id' => '[0-9]+'])->name('editor.edit');
        //     Route::post('{id}/update',      [EditorController::class, 'update'])->where(['id' => '[0-9]+'])->name('editor.update');
        //     Route::get('{id}/delete',       [EditorController::class, 'delete'])->where(['id' => '[0-9]+'])->name('editor.delete');
        //     Route::delete('{id}/destroy',   [EditorController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('editor.destroy');
        // });

        // Route::group(['prefix' => 'admin'], function () {
        //     Route::get('index',             [AdminController::class, 'index'])->name('admin.index');
        //     Route::get('create',            [AdminController::class, 'create'])->name('admin.create');
        //     Route::post('store',            [AdminController::class, 'store'])->name('admin.store');
        //     Route::get('{id}/edit',         [AdminController::class, 'edit'])->where(['id' => '[0-9]+'])->name('admin.edit');
        //     Route::post('{id}/update',      [AdminController::class, 'update'])->where(['id' => '[0-9]+'])->name('admin.update');
        //     Route::get('{id}/delete',       [AdminController::class, 'delete'])->where(['id' => '[0-9]+'])->name('admin.delete');
        //     Route::delete('{id}/destroy',   [AdminController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('admin.destroy');
        // });

        Route::group(['prefix' => 'category'], function () {
            Route::get('index',             [CategoryController::class, 'index'])->name('category.index');
            Route::get('create',            [CategoryController::class, 'create'])->name('category.create');
            Route::post('store',            [CategoryController::class, 'store'])->name('category.store');
            Route::get('{id}/edit',         [CategoryController::class, 'edit'])->where(['id' => '[0-9]+'])->name('category.edit');
            Route::post('{id}/update',      [CategoryController::class, 'update'])->where(['id' => '[0-9]+'])->name('category.update');
            Route::get('{id}/delete',       [CategoryController::class, 'delete'])->where(['id' => '[0-9]+'])->name('category.delete');
            Route::delete('{id}/destroy',   [CategoryController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('category.destroy');
        });

        Route::group(['prefix' => 'country'], function () {
            Route::get('index',             [CountryController::class, 'index'])->name('country.index');
            Route::get('create',            [CountryController::class, 'create'])->name('country.create');
            Route::post('store',            [CountryController::class, 'store'])->name('country.store');
            Route::get('{id}/edit',         [CountryController::class, 'edit'])->where(['id' => '[0-9]+'])->name('country.edit');
            Route::post('{id}/update',      [CountryController::class, 'update'])->where(['id' => '[0-9]+'])->name('country.update');
            Route::get('{id}/delete',       [CountryController::class, 'delete'])->where(['id' => '[0-9]+'])->name('country.delete');
            Route::delete('{id}/destroy',   [CountryController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('country.destroy');
        });

        Route::group(['prefix' => 'screen'], function () {
            Route::get('index',             [ScreenController::class, 'index'])->name('screen.index');
            Route::get('create',            [ScreenController::class, 'create'])->name('screen.create');
            Route::post('store',            [ScreenController::class, 'store'])->name('screen.store');
            Route::get('{id}/edit',         [ScreenController::class, 'edit'])->where(['id' => '[0-9]+'])->name('screen.edit');
            Route::post('{id}/update',      [ScreenController::class, 'update'])->where(['id' => '[0-9]+'])->name('screen.update');
            Route::get('{id}/delete',       [ScreenController::class, 'delete'])->where(['id' => '[0-9]+'])->name('screen.delete');
            Route::delete('{id}/destroy',   [ScreenController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('screen.destroy');
        });

        Route::group(['prefix' => 'seat'], function () {
            Route::get('{id}/index',        [SeatController::class, 'index'])->where(['id' => '[0-9]+'])->name('seat.index');
            Route::get('{id}/create',       [SeatController::class, 'create'])->where(['id' => '[0-9]+'])->name('seat.create');
            Route::post('store',            [SeatController::class, 'store'])->name('seat.store');
            Route::get('{id}/edit',         [SeatController::class, 'edit'])->where(['id' => '[0-9]+'])->name('seat.edit');
            Route::post('{id}/update',      [SeatController::class, 'update'])->where(['id' => '[0-9]+'])->name('seat.update');
            Route::get('{id}/delete',       [SeatController::class, 'delete'])->where(['id' => '[0-9]+'])->name('seat.delete');
            Route::delete('{id}/destroy',   [SeatController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('seat.destroy');
        });

        Route::group(['prefix' => 'discount'], function () {
            Route::get('index',             [DiscountController::class, 'index'])->name('discount.index');
            Route::get('create',            [DiscountController::class, 'create'])->name('discount.create');
            Route::post('store',            [DiscountController::class, 'store'])->name('discount.store');
            Route::get('{id}/edit',         [DiscountController::class, 'edit'])->where(['id' => '[0-9]+'])->name('discount.edit');
            Route::post('{id}/update',      [DiscountController::class, 'update'])->where(['id' => '[0-9]+'])->name('discount.update');
            Route::get('{id}/delete',       [DiscountController::class, 'delete'])->where(['id' => '[0-9]+'])->name('discount.delete');
            Route::delete('{id}/destroy',   [DiscountController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('discount.destroy');
        });

        Route::group(['prefix' => 'actor'], function () {
            Route::get('index',             [ActorController::class, 'index'])->name('actor.index');
            Route::get('create',            [ActorController::class, 'create'])->name('actor.create');
            Route::post('store',            [ActorController::class, 'store'])->name('actor.store');
            Route::get('{id}/edit',         [ActorController::class, 'edit'])->where(['id' => '[0-9]+'])->name('actor.edit');
            Route::post('{id}/update',      [ActorController::class, 'update'])->where(['id' => '[0-9]+'])->name('actor.update');
            Route::get('{id}/delete',       [ActorController::class, 'delete'])->where(['id' => '[0-9]+'])->name('actor.delete');
            Route::delete('{id}/destroy',   [ActorController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('actor.destroy');
        });

        Route::group(['prefix' => 'movie'], function () {
            Route::get('index',             [MovieController::class, 'index'])->name('movie.index');
            Route::get('create',            [MovieController::class, 'create'])->name('movie.create');
            Route::post('store',            [MovieController::class, 'store'])->name('movie.store');
            Route::get('{id}/edit',         [MovieController::class, 'edit'])->where(['id' => '[0-9]+'])->name('movie.edit');
            Route::post('{id}/update',      [MovieController::class, 'update'])->where(['id' => '[0-9]+'])->name('movie.update');
            Route::get('{id}/delete',       [MovieController::class, 'delete'])->where(['id' => '[0-9]+'])->name('movie.delete');
            Route::delete('{id}/destroy',   [MovieController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('movie.destroy');
        });

        Route::group(['prefix' => 'showtime'], function () {
            Route::get('index',             [ShowTimeController::class, 'index'])->name('showtime.index');
            Route::get('create',            [ShowTimeController::class, 'create'])->name('showtime.create');
            Route::post('store',            [ShowTimeController::class, 'store'])->name('showtime.store');
            Route::get('{id}/edit',         [ShowTimeController::class, 'edit'])->where(['id' => '[0-9]+'])->name('showtime.edit');
            Route::post('{id}/update',      [ShowTimeController::class, 'update'])->where(['id' => '[0-9]+'])->name('showtime.update');
            Route::get('{id}/delete',       [ShowTimeController::class, 'delete'])->where(['id' => '[0-9]+'])->name('showtime.delete');
            Route::delete('{id}/destroy',   [ShowTimeController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('showtime.destroy');
        });

        Route::group(['prefix' => 'review'], function () {
            Route::get('index',             [ReviewController::class, 'index'])->name('review.index');
            Route::get('create',            [ReviewController::class, 'create'])->name('review.create');
            Route::post('store',            [ReviewController::class, 'store'])->name('review.store');
            Route::get('{id}/edit',         [ReviewController::class, 'edit'])->where(['id' => '[0-9]+'])->name('review.edit');
            Route::post('{id}/update',      [ReviewController::class, 'update'])->where(['id' => '[0-9]+'])->name('review.update');
            Route::get('{id}/delete',       [ReviewController::class, 'delete'])->where(['id' => '[0-9]+'])->name('review.delete');
            Route::delete('{id}/destroy',   [ReviewController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('review.destroy');
        });

        // Route::group(['prefix' => 'tag'], function () {
        //     Route::get('index',             [TagController::class, 'index'])->name('tag.index');
        //     Route::get('create',            [TagController::class, 'create'])->name('tag.create');
        //     Route::post('store',            [TagController::class, 'store'])->name('tag.store');
        //     Route::get('{id}/edit',         [TagController::class, 'edit'])->where(['id' => '[0-9]+'])->name('tag.edit');
        //     Route::post('{id}/update',      [TagController::class, 'update'])->where(['id' => '[0-9]+'])->name('tag.update');
        //     Route::get('{id}/delete',       [TagController::class, 'delete'])->where(['id' => '[0-9]+'])->name('tag.delete');
        //     Route::delete('{id}/destroy',   [TagController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('tag.destroy');
        // });

        // Route::group(['prefix' => 'article'], function () {
        //     Route::get('index',             [ArticleController::class, 'index'])->name('article.index');
        //     Route::get('create',            [ArticleController::class, 'create'])->name('article.create');
        //     Route::post('store',            [ArticleController::class, 'store'])->name('article.store');
        //     Route::get('{id}/edit',         [ArticleController::class, 'edit'])->where(['id' => '[0-9]+'])->name('article.edit');
        //     Route::post('{id}/update',      [ArticleController::class, 'update'])->where(['id' => '[0-9]+'])->name('article.update');
        //     Route::get('{id}/delete',       [ArticleController::class, 'delete'])->where(['id' => '[0-9]+'])->name('article.delete');
        //     Route::delete('{id}/destroy',   [ArticleController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('article.destroy');
        // });

        // Route::group(['prefix' => 'comment'], function () {
        //     Route::get('index',             [CommentController::class, 'index'])->name('comment.index');
        //     Route::get('create',            [CommentController::class, 'create'])->name('comment.create');
        //     Route::post('store',            [CommentController::class, 'store'])->name('comment.store');
        //     Route::get('{id}/edit',         [CommentController::class, 'edit'])->where(['id' => '[0-9]+'])->name('comment.edit');
        //     Route::post('{id}/update',      [CommentController::class, 'update'])->where(['id' => '[0-9]+'])->name('comment.update');
        //     Route::get('{id}/delete',       [CommentController::class, 'delete'])->where(['id' => '[0-9]+'])->name('comment.delete');
        //     Route::delete('{id}/destroy',   [CommentController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('comment.destroy');
        // });

        Route::group(['prefix' => 'system'], function () {
            Route::get('index',             [SystemController::class, 'index'])->name('system.index');
            Route::post('store',            [SystemController::class, 'store'])->name('system.store');
        });
    });
