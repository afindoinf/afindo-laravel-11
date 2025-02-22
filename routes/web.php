<?php

use App\Helpers\CacheHelper;
use Buki\AutoRoute\Facades\Route;

Route::middleware(['web'])->group(function () {
    Route::get('login', 'App\Http\Controllers\Auth\LoginController@index')->name('login');
    Route::post('proses_login', 'App\Http\Controllers\Auth\LoginController@proses_login')->name('proses_login');
    Route::get('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
    Route::auto('test', 'App\Http\Controllers\TestController');
    Route::middleware('auth')->group(function () {
        Route::get('/', 'App\Http\Controllers\Admin\HomeController@index')->name('home');
        Route::auto('admin/home', 'App\Http\Controllers\Admin\HomeController');

        Route::middleware('cek.akses.user')->group(function () {
            //$routes = cache()->get('all_akses') ?? [];
            $routes = CacheHelper::getAksesCache();
            foreach ($routes as $row) {
                $method = explode("|", $row->Method ?? "auto");
                if ($row->Url != '') {
                    foreach ($method as $met) {
                        Route::$met($row->Slug, "$row->Url");
                    }
                }
            }
        });
    });
});
