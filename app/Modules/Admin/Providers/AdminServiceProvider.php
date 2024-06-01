<?php

namespace Admin\Providers;

use Admin\Models\{
    Admin,
};

use Admin\Models\Award;
use Admin\Models\Blog;
use Admin\Models\Message;
use Admin\Models\Photo;
use Admin\Models\PhotoCategory;
use Admin\Models\Project;
use Admin\Models\ProjectCategory;
use Admin\Models\Slider;
use Admin\Models\Subscriber;
use Admin\Models\Video;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AdminServiceProvider extends ServiceProvider
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
        view()->composer('Admin::_components.layout.sidebar', function ($view) {
            $view->with([
                'adminTrashesCount'             => Admin::onlyTrashed()->count(),
                'projectCategoryTrashesCount'   => ProjectCategory::onlyTrashed()->count(),
                'projectTrashesCount'           => Project::onlyTrashed()->count(),
                'videoTrashesCount'             => Video::onlyTrashed()->count(),
                'photoCategoryTrashesCount'     => PhotoCategory::onlyTrashed()->count(),
                'awardTrashesCount'             => Award::onlyTrashed()->count(),
                'blogTrashesCount'              => Blog::onlyTrashed()->count(),
                'messageTrashesCount'           => Message::onlyTrashed()->count(),
                'photoTrashesCount'             => Photo::onlyTrashed()->count(),
                'sliderTrashesCount'            => Slider::onlyTrashed()->count(),
                'subscriberTrashesCount'        => Subscriber::onlyTrashed()->count(),
            ]);
        });

        $moduleName = 'Admin';
        config([
            $moduleName => File::getRequire(loadConfigFile('routePrefix', $moduleName))
        ]);
        $this->loadRoutesFrom(loadRoute('web', $moduleName));
        $this->loadViewsFrom(loadViews($moduleName), $moduleName);
        $this->loadTranslationsFrom(loadTranslations($moduleName), $moduleName);
        $this->loadMigrationsFrom(loadMigrations($moduleName));
        Blade::componentNamespace('Admin\View\Components', 'admin');
    }
}
