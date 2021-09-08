<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Categories;
use App\Enums\CategoryTypes AS Category;
use App\Models\Tag;
use App\Models\Notification;

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

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Set language default
        \Session::put('website_language', 'en');
        //get notification
        $notifications = Notification::orderBy('created_at','desc')->get();
        $count_notification = Notification::count();
        // Share data all site
        \View::share([
            'category_foods' => Categories::categoryType(Category::FOOD)->get(),
            'category_drinks' => Categories::categoryType(Category::DRINK)->get(),
            'list_tags' => Tag::StatusTag()->get(),
            'notifications' => $notifications,
            'count_notification' => $count_notification,
        ]);

    }
}
