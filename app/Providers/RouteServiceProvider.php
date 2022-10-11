<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';
    
    protected $user_api_namespace = 'App\Http\Controllers\Api\User';
    protected $teacher_api_namespace = 'App\Http\Controllers\Api\Teacher';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/site';
    public const ADMIN = '/admin';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();
        $this->mapApiTeacherRoutes();

        $this->mapWebRoutes();
        // $this->mapSiteRoutes();
        $this->mapAdminRoutes();


        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "site" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    // protected function mapSiteRoutes()
    // {
    //     Route::middleware('web')
    //         ->namespace($this->namespace)
    //         ->group(base_path('routes/site.php'));
    // }

    /**
     * Define the "admin" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapAdminRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/admin.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api/user')
            ->middleware(['api' , 'CheckLanguageApi'])
            ->namespace($this->user_api_namespace)
            ->group(base_path('routes/api.php'));
    }

    protected function mapApiTeacherRoutes()
    {
        Route::prefix('api/teacher')
            ->middleware(['api' , 'CheckLanguageApi'])
            ->namespace($this->teacher_api_namespace)
            ->group(base_path('routes/api_teacher.php'));
    }

}
