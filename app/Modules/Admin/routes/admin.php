<?php

use Illuminate\Support\Facades\Route;

Route::get('/hello', function (){
    return "hello";
});
Route::group(['middleware' => 'web', 'as' => 'admins.'], function () {
    Route::get('login', 'AuthController@checkLogin')->name('login');
    Route::post('login', 'AuthController@login')->middleware('throttle:6,1');

    Route::middleware('privilege:super')->group(function () {
        Route::get('/', 'DashboardController')->name('home');
        /**
         * Admin Module Routes
         */
        Route::resource('admin', 'AdminController');
        Route::prefix('admins')->group(function () {
            Route::as('admin.')->group(function () {
                Route::get('data', 'AdminController@data')->name('data');
                Route::post('reset/password', 'AdminController@resetPassword')->name('reset.password');
                Route::post('trash', 'AdminController@trash')->name('trash');
                Route::post('restore', 'AdminController@restore')->name('restore');
                Route::get('export', 'AdminController@export')->name('export');
            });
        });
        /**
         * Project Category Module Routes
         */
        Route::resource('projectCategory', 'ProjectCategoryController');
        Route::prefix('projectCategories')->group(function () {
            Route::as('projectCategory.')->group(function () {
                Route::get('store/feature/{id}', 'ProjectCategoryController@storeFeature')->name('storeFeature');
                Route::get('data', 'ProjectCategoryController@data')->name('data');
                Route::post('trash', 'ProjectCategoryController@trash')->name('trash');
                Route::post('restore', 'ProjectCategoryController@restore')->name('restore');
                Route::get('export', 'ProjectCategoryController@export')->name('export');
            });
        });
        /**
         * Project Module Routes
         */
        Route::resource('project', 'ProjectController');
        Route::prefix('projects')->group(function () {
            Route::as('project.')->group(function () {
                Route::get('store/feature/{id}', 'ProjectController@storeFeature')->name('storeFeature');
                Route::get('sections/{id}', 'ProjectController@sections')->name('sections');
                Route::get('section/create/{id}', 'ProjectController@createSection')->name('create.section');
                Route::post('section/store', 'ProjectController@storeSection')->name('section.store');
                Route::get('append/options', 'ProjectController@appendOptions')->name('append.options');
                Route::get('section/edit/{id}', 'ProjectController@editSection')->name('edit.section');
                Route::post('section/update/{id}', 'ProjectController@updateSection')->name('update.section');
                Route::delete('section/destroy/{id}', 'ProjectController@destroySection')->name('destroy.section');
                Route::get('data', 'ProjectController@data')->name('data');
                Route::get('section/data', 'ProjectController@sectionData')->name('section.data');
                Route::post('trash', 'ProjectController@trash')->name('trash');
                Route::post('restore', 'ProjectController@restore')->name('restore');
                Route::get('export', 'ProjectController@export')->name('export');
                Route::get('section/export', 'ProjectController@exportSection')->name('section.export');

            });
        });
        /**
         * Video Module Routes
         */
        Route::resource('video', 'VideoController');
        Route::prefix('videos')->group(function () {
            Route::as('video.')->group(function () {
                Route::get('store/feature/{id}', 'VideoController@storeFeature')->name('storeFeature');
                Route::get('data', 'VideoController@data')->name('data');
                Route::post('trash', 'VideoController@trash')->name('trash');
                Route::post('restore', 'VideoController@restore')->name('restore');
                Route::get('export', 'VideoController@export')->name('export');
            });
        });
        /**
         * Photo Category Module Routes
         */
        Route::resource('photoCategory', 'PhotoCategoryController');
        Route::prefix('photoCategories')->group(function () {
            Route::as('photoCategory.')->group(function () {
                Route::get('store/feature/{id}', 'PhotoCategoryController@storeFeature')->name('storeFeature');
                Route::get('data', 'PhotoCategoryController@data')->name('data');
                Route::post('trash', 'PhotoCategoryController@trash')->name('trash');
                Route::post('restore', 'PhotoCategoryController@restore')->name('restore');
                Route::get('export', 'PhotoCategoryController@export')->name('export');
            });
        });
        /**
         * Photo Module Routes
         */
        Route::resource('photo', 'PhotoController');
        Route::prefix('photos')->group(function () {
            Route::as('photo.')->group(function () {
                Route::get('sections/{id}', 'PhotoController@sections')->name('sections');
                Route::get('colour/{id}', 'PhotoController@colour')->name('colour');
                Route::get('colours/view/{id}', 'PhotoController@ColoursView')->name('colours.view');
                Route::get('get/colour/row', 'PhotoController@getColourRow')->name('get.colour.row');
                Route::get('delete/colour/{id}', 'PhotoController@deleteColour')->name('delete.colour');
                Route::get('section/create/{id}', 'PhotoController@createSection')->name('create.section');
                Route::post('section/store', 'PhotoController@storeSection')->name('section.store');
                Route::post('colour/store', 'PhotoController@storeColour')->name('store.colour');
                Route::post('colour/update', 'PhotoController@UpdateColour')->name('update.colour');
                Route::get('append/options', 'PhotoController@appendOptions')->name('append.options');
                Route::get('section/edit/{id}', 'PhotoController@editSection')->name('edit.section');
                Route::post('section/update/{id}', 'PhotoController@updateSection')->name('update.section');
                Route::delete('section/destroy/{id}', 'PhotoController@destroySection')->name('destroy.section');
                Route::get('data', 'PhotoController@data')->name('data');
                Route::get('section/data', 'PhotoController@sectionData')->name('section.data');
                Route::post('trash', 'PhotoController@trash')->name('trash');
                Route::post('restore', 'PhotoController@restore')->name('restore');
                Route::get('export', 'PhotoController@export')->name('export');
                Route::get('section/export', 'PhotoController@exportSection')->name('section.export');

            });
        });
        /**
         * Award Module Routes
         */
        Route::resource('award', 'AwardController');
        Route::prefix('awards')->group(function () {
            Route::as('award.')->group(function () {
                Route::get('store/feature/{id}', 'AwardController@storeFeature')->name('storeFeature');
                Route::get('data', 'AwardController@data')->name('data');
                Route::post('trash', 'AwardController@trash')->name('trash');
                Route::post('restore', 'AwardController@restore')->name('restore');
                Route::get('export', 'AwardController@export')->name('export');
            });
        });
        /**
         * Blog Module Routes
         */
        Route::resource('blog', 'BlogController');
        Route::prefix('blogs')->group(function () {
            Route::as('blog.')->group(function () {
                Route::get('store/feature/{id}', 'BlogController@storeFeature')->name('storeFeature');
                Route::get('sections/{id}', 'BlogController@sections')->name('sections');
                Route::get('section/create/{id}', 'BlogController@createSection')->name('create.section');
                Route::post('section/store', 'BlogController@storeSection')->name('section.store');
                Route::get('append/options', 'BlogController@appendOptions')->name('append.options');
                Route::get('section/edit/{id}', 'BlogController@editSection')->name('edit.section');
                Route::post('section/update/{id}', 'BlogController@updateSection')->name('update.section');
                Route::delete('section/destroy/{id}', 'BlogController@destroySection')->name('destroy.section');
                Route::get('data', 'BlogController@data')->name('data');
                Route::get('section/data', 'BlogController@sectionData')->name('section.data');
                Route::post('trash', 'BlogController@trash')->name('trash');
                Route::post('restore', 'BlogController@restore')->name('restore');
                Route::get('export', 'BlogController@export')->name('export');
                Route::get('section/export', 'BlogController@exportSection')->name('section.export');
            });
        });
        /**
         * Message Module Routes
         */
        Route::resource('message', 'MessageController')->except(['create','store','edit','update']);
        Route::prefix('messages')->group(function () {
            Route::as('message.')->group(function () {
                Route::get('store/feature/{id}', 'MessageController@storeFeature')->name('storeFeature');
                Route::get('data', 'MessageController@data')->name('data');
                Route::post('trash', 'MessageController@trash')->name('trash');
                Route::post('restore', 'MessageController@restore')->name('restore');
                Route::get('export', 'MessageController@export')->name('export');
            });
        });
        /**
         * Slider Module Routes
         */
        Route::resource('slider', 'SliderController')->except(['edit','update','export']);
        Route::prefix('sliders')->group(function () {
            Route::as('slider.')->group(function () {
                Route::get('data', 'SliderController@data')->name('data');
                Route::post('trash', 'SliderController@trash')->name('trash');
                Route::post('restore', 'SliderController@restore')->name('restore');
                Route::get('export', 'SliderController@export')->name('export');
            });
        });
        /**
         * Subscriber Module Routes
         */
        Route::resource('subscriber', 'SubscriberController')->except(['create','restore','export','trash','destroy','store','edit','update']);
        Route::prefix('subscribers')->group(function () {
            Route::as('subscriber.')->group(function () {
                Route::get('data', 'SubscriberController@data')->name('data');
            });
        });
        /**
         * Logout..
         */
        Route::get('logout', 'AuthController@logout')->name('logout');
    });
});

