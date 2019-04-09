<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use App\Directory;
use App\Post;
use App\Business;

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

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        // parent::boot();
        // //Route::model('directory', Directory::class);
        // Route::bind('directory', function ($value) {
        //     return Directory::where('title', $value)->first() ?? abort(404);
        // });


        // $locale = request()->segment(1);
        // Route::bind('post', function ($slug) use ($locale) {
        //     //return \App\Post::where('slug->' . $locale, $slug)->first() ?? abort(404);
        //     $post = Post::where('slug->' . $locale, $slug)->first();
        //     if ($post) {
        //         return $post;
        //     } else {
        //         foreach (config('app.locales') as $locale => $label) {
        //             $postInLocale = Post::where('slug->' . $locale, $slug)->first();
        //             if ($postInLocale) {
        //                 return redirect()->to(
        //                     str_replace($slug, $postInLocale->slug, request()->fullUrl())
        //                 )->send();
        //             }
        //         }
        //         abort(404);
        //     }            
        // });        

        parent::boot();
        $locale = request()->segment(1);

        Route::bind('directory', function ($value) {
            return Directory::where('title', $value)->first() ?? abort(404);
        });

        Route::bind('business', function ($value) {
            return Business::where('slug', $value)->first() ?? abort(404);
        });
        


        // Route::bind('post', function ($slug) use ($locale) {
        //     return $this->resolveModel(Post::class, $slug, $locale);
        // });

        // Route::bind('video', function ($slug) use ($locale) {
        //     return $this->resolveModel(Video::class, $slug, $locale);
        // });
        
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();
        
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

        // $locale = request()->segment(1);
        // Route::middleware(['web', 'localized'])
        //     ->prefix($locale)
        //     ->namespace($this->namespace)
        //     ->group(base_path('routes/web.php'));

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
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }


    protected function resolveModel($modelClass, $slug, $locale)
    {
        
        //$model = $modelClass::where('slug->' . $locale, $slug)->first();
        $model = Post::whereRaw("UPPER('slug') LIKE '%'". strtoupper($slug)."'%'")->first();
        
        if (is_null($model)) {
            foreach (config('app.locales') as $localeKey => $label) {

                
                //$modelInLocale = $modelClass::where('slug->' . $localeKey, $slug)->first();
                $modelInLocale = Post::whereRaw("UPPER('slug') LIKE '%'". strtoupper($slug)."'%'")->first();

                if ($modelInLocale) {
                    return redirect()->to(
                        str_replace($slug, $modelInLocale->slug, request()->fullUrl())
                    )->send();
                }
            }

            abort(404);
        }

        return $model;
    }

}
