<?php declare(strict_types=1);

namespace App\Providers;

use App\Events\ChirpCreated;
use App\Listeners\SendChirpCreatedNotifications;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        ChirpCreated::class => [SendChirpCreatedNotifications::class],
        Registered::class   => [SendEmailVerificationNotification::class],
    ];

    public function boot(): void
    {
    }

    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
