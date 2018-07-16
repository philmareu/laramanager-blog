<?php

Route::group(['namespace' => substr(app()->getNamespace(), 0, -1), 'middleware' => 'web'], function()
{
    Route::get('blog', 'Http\Controllers\BlogController@index');
    Route::get('blog/{year}/{month}/{day}/{slug}', 'Http\Controllers\BlogController@show');
});