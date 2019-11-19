<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
{


//frontend
app('view')->composer('*', function ($view) {
        $AppLangUser = LangUser(\App::getLocale());
        $view->with(compact('AppLangUser'));
    });

app('view')->composer('*', function ($view) {
        $AppLanguagesHeader = \App\Language::Languagelist();
        $view->with(compact('AppLanguagesHeader'));
    });


//backend
app('view')->composer('backend.includes.sidebar', function ($view) {

        $sidebar_menus = \App\Permission::whereIsMenu(1)->orderBy('order_list','ASC')->get();
  
        $view->with(compact('sidebar_menus'));
});





}

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
