<?php

use Illuminate\Support\Facades\Route;



Route::namespace('User\Http\Controllers')->prefix('api')->middleware('api')->group(function () {

    /**
     * Project Categories Routes
     */
    Route::get('/project/categories', 'ProjectCategoryController@index');
    Route::get('/search/category', 'ProjectCategoryController@search');


    /**
     * Projects Routes
     */

        Route::post('/projects', 'ProjectController@index');
        Route::get('/show/project', 'ProjectController@showProject');
        Route::get('/search/project', 'ProjectController@search');


    /**
     * Videos Routes
     */
    Route::get('/videos', 'VideoController');
    /**
     * Photo Categories Routes
     */
    Route::get('/photo/categories', 'PhotoCategoryController');

    /**
     * photos Routes
     */
    Route::post('/photos', 'PhotoController@index');
    Route::get('/show/photo', 'PhotoController@showPhoto');

    /**
     * Awards Routes
     */
    Route::get('/awards', 'AwardController');

    /**
     * Blogs Routes
     */
    Route::get('/blogs', 'BlogController@index');
    Route::get('/show/blog', 'BlogController@showBlog');
    /**
     * Message Routes
     */

    Route::post('/send/message', 'MessageController');

    /**
     * Subscriber Routes
     */

    Route::post('/store/subscriber', 'SubscriberController');
    /**
     * slider Routes
     */
    Route::get('/slider', 'SliderController');

});
