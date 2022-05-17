<?php

namespace App\Providers;

use App\Services\Eloquent\JournalServiceImpl;
use App\Services\JournalService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class JournalServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        JournalService::class => JournalServiceImpl::class
    ];

    public function provides()
    {
        return [JournalService::class];
    }

    /**
     * Register services.
     *
     * @return void
     */
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
