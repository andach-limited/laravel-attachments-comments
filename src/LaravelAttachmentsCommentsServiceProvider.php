<?php

namespace Andach\LaravelAttachmentsComments;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Andach\LaravelAttachmentsComments\Commands\LaravelAttachmentsCommentsCommand;

class LaravelAttachmentsCommentsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-attachments-comments')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-attachments-comments_table');
    }
}
