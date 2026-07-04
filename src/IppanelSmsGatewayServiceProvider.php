<?php

declare(strict_types=1);

namespace Misaf\LaravelSmsGatewayIppanel;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Misaf\LaravelSmsGateway\SmsGatewayManager;
use Misaf\LaravelSmsGatewayIppanel\Drivers\IppanelDriver;

final class IppanelSmsGatewayServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->callAfterResolving(SmsGatewayManager::class, function (SmsGatewayManager $manager): void {
            $manager->extend('ippanel', fn(Application $app): IppanelDriver => $app->make(IppanelDriver::class));
        });
    }
}
