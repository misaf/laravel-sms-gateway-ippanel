<?php

declare(strict_types=1);

namespace Misaf\LaravelSmsGatewayIppanel\Drivers;

use Illuminate\Http\Client\PendingRequest;
use Misaf\LaravelSmsGateway\SmsGatewayDriver;

final class IppanelDriver extends SmsGatewayDriver
{
    protected function driverName(): string
    {
        return 'ippanel';
    }

    protected function defaultGateway(): string
    {
        return 'https://ippanel.com/services.jspd';
    }

    protected function configureRequest(PendingRequest $request): PendingRequest
    {
        return $request
            ->asForm()
            ->withQueryParameters([
                'uname' => $this->serviceConfigString('username'),
                'pass'  => $this->serviceConfigString('password'),
            ]);
    }
}
