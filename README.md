# Laravel SMS Gateway IPPanel Driver

IPPanel SMS gateway driver for [`misaf/laravel-sms-gateway`](https://github.com/misaf/laravel-sms-gateway).

## Installation

```bash
composer require misaf/laravel-sms-gateway-ippanel
```

Laravel package discovery registers the driver service provider automatically.

## Configuration

```env
SMS_GATEWAY_DRIVER=ippanel
SMS_GATEWAY_IPPANEL_USERNAME=your-username
SMS_GATEWAY_IPPANEL_PASSWORD=your-password
```

```php
// config/services.php
'ippanel' => [
    'username' => env('SMS_GATEWAY_IPPANEL_USERNAME'),
    'password' => env('SMS_GATEWAY_IPPANEL_PASSWORD'),
],
```

## Usage

```php
use Misaf\LaravelSmsGateway\Facade\SmsGateway;

$response = SmsGateway::driver('ippanel')->send([
    'to'      => '09123456789',
    'message' => 'Hello',
]);
```

The payload is passed directly to IPPanel, so use the fields expected by the IPPanel API.

Use `request()` when you need direct access to Laravel's HTTP client:

```php
$request = SmsGateway::driver('ippanel')->request();
```

## Testing

```bash
composer test
composer analyse
```

## License

MIT
