<?php

namespace Andach\LaravelAttachmentsComments;

use Andach\LaravelAttachmentsComments\Models\Attachment;
use Andach\LaravelAttachmentsComments\Models\Comment;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
            ->hasViewComponents('andach', Attachment::class, Comment::class)
            ->hasMigration('create_attachments_comments_table')
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->startWith(function (InstallCommand $command) {
                        $command->info('Hello, and welcome to my great new package!');
                    })
                    ->publishConfigFile()
                    ->publishMigrations()
                    ->askToStarRepoOnGitHub('andach-limited/laravel-attachments-comments')
                    ->endWith(function (InstallCommand $command) {
                        $command->info('Have a great day!');
                    });
            });
    }
}
