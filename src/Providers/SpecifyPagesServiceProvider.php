<?php

declare(strict_types=1);
 
namespace BlimeyDev\LaravelSpecify\Providers;
 
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class SpecifyPagesServiceProvider extends ServiceProvider
{
    

    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/specify.php' => config_path('specify.php'),
        ], 'specify-config');

        // Allow publishing
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/specify'),
        ], 'specify-views');

        $this->publishes([
            __DIR__ . '/../resources/dist' => public_path('vendor/specify'),
        ], 'specify-compiled-assets');

        $this->publishes([
            __DIR__ . '/../resources/css' => resource_path('css/specify'),
            __DIR__ . '/../resources/js' => resource_path('js/specify'),
        ], 'specify-assets');

        $this->mergeConfigFrom(
            __DIR__ . '/../config/specify.php',
            'specify'
        );

        $this->loadViewsFrom(
            __DIR__ . '/../resources/views',
            'specify'
        );
        
        if (config('specify.enabled', true)) {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        }

        \View::composer('specify::sidebar', \BlimeyDev\LaravelSpecify\Composers\SidebarViewComposer::class);
    }
}