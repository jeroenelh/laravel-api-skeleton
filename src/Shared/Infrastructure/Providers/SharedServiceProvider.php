<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Override;

final class SharedServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    #[Override]
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
