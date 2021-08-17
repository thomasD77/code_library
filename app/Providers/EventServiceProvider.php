<?php

namespace App\Providers;

use App\Events\UsersSoftDeleteOrders;
use App\Events\UsersSoftRestoreOrders;
use App\Listeners\execUsersSoftDeleteOrders;
use App\Listeners\execUsersSoftRestoreOrders;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        UsersSoftDeleteOrders::class => [
            execUsersSoftDeleteOrders::class,
        ],

        UsersSoftRestoreOrders::class => [
            execUsersSoftRestoreOrders::class,
            ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
