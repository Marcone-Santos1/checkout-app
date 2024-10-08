<?php

use MiniRestFramework\Router\Route;
use MiniRest\Http\Controllers\{
    SalesController,
    ProductsController,
    ReportsController
};

Route::prefix('/api')->group([], function () {
    Route::prefix('/products')->group([], function () {
        Route::get('/', [ProductsController::class, 'get']);
        Route::get('/{id}', [ProductsController::class, 'getById']);
        Route::post('/create', [ProductsController::class, 'create']);
        Route::put('/{id}', [ProductsController::class, 'update']);
        Route::delete('/{id}', [ProductsController::class, 'delete']);
    });
    Route::prefix('/sales')->group([], function () {
        Route::get('/', [SalesController::class, 'get']);
        Route::get('/{id}', [SalesController::class, 'getById']);
        Route::post('/create', [SalesController::class, 'create']);
        Route::delete('/{id}', [SalesController::class, 'delete']);
    });
    Route::prefix('/reports')->group([], function () {
        Route::get('/sales', [ReportsController::class, 'sales']);
        Route::get('/products', [ReportsController::class, 'products']);
    });

});


//dd(json_encode(\MiniRestFramework\Router\Router::$routes));