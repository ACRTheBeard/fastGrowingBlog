<?php

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/editor', 'EditorController@index')->name('editor');
