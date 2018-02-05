<?php

namespace App\Providers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Monolog\Logger;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\SyslogUdpHandler;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

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
    }
}
