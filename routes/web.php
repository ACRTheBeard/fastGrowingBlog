<?php

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/editor', 'EditorController@index')->name('editor');
Route::get('/editor/categories', 'EditorController@category')->name('editCategories');
Route::get('/editor/categories/{id}', 'CategoryController@createOrUpdate')->name('rootCategory');
Route::get('/editor/categories/{id}/{parentId}', 'CategoryController@createOrUpdate')->name('childCategory');
Route::post('/editor/categories/{id}', 'CategoryController@createOrUpdate');
Route::post('/editor/categories/{id}/{parentId}', 'CategoryController@createOrUpdate');

