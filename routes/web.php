<?php

use Illuminate\Support\Facades\Route;

Route::get('/Dashboard', function () {
    return view('Dashboard');
});

Route::get('/TambahAkun', function () {
    return view('TambahAkun');
});