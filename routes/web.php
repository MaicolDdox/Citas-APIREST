<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

Route::get('prueba-web', function(){
    return 'prueba de web.php';
});

require __DIR__.'/auth.php';
