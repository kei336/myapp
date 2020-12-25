<?php
namespace App\Providers;
 
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
 
class ComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function($view) {
            $view->with('user', Auth::user());
        });
    }
}