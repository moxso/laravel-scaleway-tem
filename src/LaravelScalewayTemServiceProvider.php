<?php

namespace Moxso\LaravelScalewayTem;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Symfony\Component\Mailer\Bridge\Scaleway\Transport\ScalewayTransportFactory;
use Symfony\Component\Mailer\Transport\Dsn;

class LaravelScalewayTemServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-scaleway-tem')
            ->hasConfigFile('scaleway-tem');
    }

    public function bootingPackage(): void
    {
        Mail::extend('scaleway', function (array $config) {
            return (new ScalewayTransportFactory)->create(
                new Dsn('scaleway+api', 'default',
                    data_get($config, 'project_id') ?? Config::get('scaleway-tem.project_id'),
                    data_get($config, 'api_key') ?? Config::get('scaleway-tem.api_key'),
                    options: [
                        'region' => data_get($config, 'options.region') ?? Config::get('scaleway-tem.region'),
                    ]
                )
            );
        });
    }
}
