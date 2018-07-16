<?php

Route::group(['namespace' => 'PhilMareu\LaraManagerBlog\Http\Controllers', 'middleware' => 'web'], function()
{
    Route::get('blog', 'BlogController@index');
    Route::get('blog/{year}/{month}/{day}/{slug}', 'BlogController@show');
});