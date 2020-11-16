<?php

namespace App\Providers;

use App\Events\NewsEvent;
use App\Listeners\LastLoginUpdateListener;
use App\Listeners\NewsUpdateImageListener;
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
		'Illuminate\Auth\Events\Login' => [
             LastLoginUpdateListener::class
		],
		NewsEvent::class => [
			 NewsUpdateImageListener::class
		],
		\SocialiteProviders\Manager\SocialiteWasCalled::class => [
			// ... other providers
			'SocialiteProviders\\VKontakte\\VKontakteExtendSocialite@handle',
		],
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
