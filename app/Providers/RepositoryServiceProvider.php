<?php

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Repositories\Contracts\IBaseRepository;
use App\Repositories\Contracts\IHotelRepository;
use App\Repositories\Contracts\IRoomRepository;
use App\Repositories\HotelRepository;
use App\Repositories\RoomRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind(
            IBaseRepository::class,
            BaseRepository::class
        );

        $this->app->bind(
            IHotelRepository::class,
            HotelRepository::class
        );

        $this->app->bind(
            IRoomRepository::class,
            RoomRepository::class
        );
    }
}
