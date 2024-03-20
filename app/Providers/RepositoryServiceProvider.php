<?php

namespace App\Providers;

use Api\Repositories\Contracts\IHotelRepositoryApi;
use Api\Repositories\Contracts\IRoomRepositoryApi;
use Api\Repositories\HotelRepositoryApi;
use Api\Repositories\RoomRepositoryApi;
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

        $this->app->bind(
            IHotelRepositoryApi::class,
            HotelRepositoryApi::class
        );

        $this->app->bind(
            IRoomRepositoryApi::class,
            RoomRepositoryApi::class
        );
    }
}
