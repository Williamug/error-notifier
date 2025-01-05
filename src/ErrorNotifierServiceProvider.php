<?php

namespace Williamug\ErrorNotifier;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Williamug\ErrorNotifier\Commands\ErrorNotifierCommand;

class ErrorNotifierServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('error-notifier')
            ->hasConfigFile('error-notifier')
            ->hasViews('error-notifier::emails.error-notifier')
            ->hasMigration('create_error_notifier_table')
            ->hasCommand(ErrorNotifierCommand::class);
    }
}
