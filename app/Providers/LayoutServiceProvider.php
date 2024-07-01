<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class LayoutServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $layout = 'app.layouts.app'; // Default layout

            if (Auth::check()) {
                switch (Auth::user()->role) {
                    case 'admin':
                        $layout = 'admin.layouts.app';
                        break;
                    case 'user':
                        $layout = 'user.layouts.app';
                        break;
                }
            }

            $view->with('layout', $layout);
        });
    }
}
