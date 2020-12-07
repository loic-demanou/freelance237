<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\ServiceProvider;
use Livewire\Component;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
        // public function scopeSearch($field, $string)
    // {
    // }


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Builder::macro('search', function($field, $string){
            return $string ? $this->where($field, 'like', '%'.$string. '%'): $this;

        });

    }
}
