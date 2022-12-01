<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            $this->registerCustomRoutes('api/admin', 'api/admin', ['api', 'auth:sanctum']);

            $this->registerCustomRoutes('api/entrenador', 'api/entrenador');

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }

    private function registerCustomRoutes($prefix = 'api', $path = 'api', $middleware = ['api'])
    {
        return Route::prefix($prefix)
            ->middleware($middleware)
            ->group(function () use ($path) {
                foreach (scandir(base_path("routes/{$path}")) as $file) {
                    if (!Str::contains($file, '.php')) continue;
                    $cleanFileName = Str::replace('.php', '', $file);
                    $finalName = Str::slug($cleanFileName, '-', 'es');
                    Route::prefix($finalName)->group(base_path("routes/{$path}/{$file}"));
                }
            });
    }
}
