<?php

Route::get('/', 'FrontendController@index')->name('home');
Route::get('/categories/{id}', 'FrontendController@index')->name('home');

Auth::routes();

Route::get('/editor', 'EditorController@index')->name('editor');

// routes for the category editor
Route::get('/editor/categories', 'EditorController@categories')->name('editCategories');
Route::get('/editor/categories/{id}', 'CategoryController@createOrUpdate')->name('rootCategory');
Route::get('/editor/categories/{id}/{parentId}', 'CategoryController@createOrUpdate')->name('childCategory');
Route::post('/editor/categories/{id}', 'CategoryController@createOrUpdate');
Route::post('/editor/categories/{id}/{parentId}', 'CategoryController@createOrUpdate');
Route::post('/editor/categories/{id}', 'CategoryController@delete');

// routes for the post editor
Route::get('/editor/posts', 'EditorController@posts')->name('editPosts');
Route::get('/editor/posts/{id}', 'PostController@createOrUpdate')->name('post');
Route::post('/editor/posts/{id}', 'PostController@createOrUpdate');


