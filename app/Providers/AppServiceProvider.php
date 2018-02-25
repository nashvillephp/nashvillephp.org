<?php
declare(strict_types=1);

namespace App\Providers;

use Camel\CaseTransformer;
use Camel\Format\CamelCase;
use Camel\Format\SnakeCase;
use DMS\Service\Meetup\MeetupKeyAuthClient;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Monolog\Logger;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\SyslogUdpHandler;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Papertrail logging
        $papertrailUrl = env('PAPERTRAIL_URL', '');
        $papertrailPort = env('PAPERTRAIL_PORT');

        if (filter_var($papertrailUrl, FILTER_VALIDATE_URL)) {
            $output = "%channel%.%level_name%: %message%";
            $formatter = new LineFormatter($output);
            $logger = Log::getMonolog();
            $syslogHandler = new SyslogUdpHandler($papertrailUrl, $papertrailPort);
            $syslogHandler->setFormatter($formatter);
            $logger->pushHandler($syslogHandler);
        }

        $this->app->bind(MeetupKeyAuthClient::class, function () {
            return MeetupKeyAuthClient::factory([
                'scheme' => 'https',
                'key' => config('meetup.api_key'),
            ]);
        });

        $this->app->bind(CaseTransformer::class, function () {
            return new CaseTransformer(new CamelCase(), new SnakeCase());
        });
    }
}
