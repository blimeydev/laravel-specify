<?php

use Illuminate\Support\Facades\Route;
use BlimeyDev\LaravelSpecify\Http\Controllers\SpecifyPagesController;

if(config('specify.subdomain')){
    Route::domain(config('specify.subdomain'))->group(function () {
        Route::middleware(config('specify.middleware'))
            ->prefix(config('specify.route_prefix'))
            ->group(function () {
                Route::get('/', [SpecifyPagesController::class, 'index'])
                    ->name('specify.index');
                Route::get('/{feature}/{path?}', [SpecifyPagesController::class, 'show'])
                    ->where('path', '.*')
                    ->name('specify.show');
            });
    });
}else{
    Route::middleware(config('specify.middleware'))
        ->prefix(config('specify.route_prefix'))
        ->group(function () {
            Route::get('/', [SpecifyPagesController::class, 'index'])
                ->name('specify.index');
            Route::get('/{feature}/{path?}', [SpecifyPagesController::class, 'show'])
                ->where('path', '.*')
                ->name('specify.show');
        });
}
