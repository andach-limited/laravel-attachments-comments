<?php

namespace Andach\LaravelAttachmentsComments\Console;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Andach\LaravelAttachmentsComments\Console\InstallCommand;

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
            ->hasMigration('create_attachments_comments_table')
            ->hasInstallCommand(InstallCommand::class);
//            ->hasInstallCommand(function(InstallCommand $command) {
//                $command
//                    ->startWith(function(InstallCommand $command) {
//                        $command->info('Hello, and welcome to my great new package!');
//                    })
//                    ->publishConfigFile()
//                    ->publishMigrations()
//                    ->askToStarRepoOnGitHub('andach-limited/laravel-attachments-comments')
//                    ->endWith(function(InstallCommand $command) {
//                        $command->info('Have a great day!');
//                    });
    }
}
