<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// dev tools routes below
require __DIR__ . '/dev-tools.php';
