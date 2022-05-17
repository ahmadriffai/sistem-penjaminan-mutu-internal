<?php

namespace App\Providers;

use App\Service\Eloquent\LecturerServiceImpl;
use App\Service\LecturerService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class LecturerServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        LecturerService::class => LecturerServiceImpl::class
    ];

    public function provides(): array
    {
        return [LecturerService::class];
    }

    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
