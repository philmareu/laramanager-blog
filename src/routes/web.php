<?php

Route::group(['namespace' => 'PhilMareu\LaraManagerBlog\Http\Controllers', 'middleware' => 'web'], function()
{
    Route::get('blog', 'BlogController@index');
    Route::get('blog/preview/{id}', 'BlogController@preview')->middleware('admin');
    Route::get('blog/{year}/{month}/{day}/{slug}', 'BlogController@show');
    Route::get('blog/category/{category}', 'BlogController@category');
    Route::get('blog/archive/{year}/{month}', 'BlogController@archive');

    Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'as' => 'admin.'], function()
    {
        Route::get('blog', 'Admin/BlogController@index');
    });
});