<?php

// For reference
// Route::get('/podcasts',                    'PodcastsController@index');
// Route::get('/podcasts/create',             'PodcastsController@create');
// Route::post('/podcasts',                   'PodcastsController@store');
// Route::get('/podcasts/{id}',               'PodcastsController@show');
// Route::get('/podcasts/{id}/edit',          'PodcastsController@edit');
// Route::patch('/podcasts/{id}',             'PodcastsController@update');
// Route::delete('/podcasts/{id}',            'PodcastsController@destroy');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// User Routes
Route::middleware('auth')->group(function () {
    Route::get('/orders', 'UserOrdersController@index')->name('user.orders');
    Route::get('/orders/create', 'UserOrdersController@create')->name('user.orders.create');
    Route::post('/orders', 'UserOrdersController@store')->name('user.orders.store');
    Route::get('/orders/{order}', 'UserOrdersController@show')->name('user.orders.show');
});

// Admin Routes - Make sure you implement an auth layer here
Route::prefix('admin')->group(function () {
    Route::get('/orders', 'AdminOrdersController@index')->name('admin.orders');
    Route::get('/orders/edit/{order}', 'AdminOrdersController@edit')->name('admin.orders.edit');
    Route::patch('/orders/{order}', 'AdminOrdersController@update')->name('admin.orders.update');
});

Route::redirect('/admin', '/admin/orders');
