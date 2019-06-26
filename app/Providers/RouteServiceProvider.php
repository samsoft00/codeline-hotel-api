<?php

namespace App\Providers;

use App\Room;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use App\Booking;
use App\Hotel;
use App\RoomType;
use App\Price;

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
        Route::bind('room-manager', function ($value) {
            return Room::with(['hotel', 'capacity', 'type'])->where('id', $value)->first() ?? abort(404);
        });

        Route::bind('hotel-manager', function ($value) {
            return Hotel::with(['rooms'])->where('id', $value)->first() ?? abort(404);
        });

        Route::bind('room-type-manager', function ($value) {
            return RoomType::where('id', $value)->first() ?? abort(404);
        });

        Route::bind('price-list-manager', function ($value) {
            return Price::with(['type'])->where('id', $value)->first() ?? abort(404);
        });       

        Route::bind('book-room', function ($value) {
            return Booking::with(['room.type.cost', 'room.capacity', 'customer'])->where('id', $value)->first() ?? abort(404);
        });

        Route::bind('booking-manager', function ($value) {
            return Booking::with(['room.type.cost', 'room.capacity', 'customer'])->where('id', $value)->first() ?? abort(404);
        });

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
}
