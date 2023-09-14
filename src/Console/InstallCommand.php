<?php

namespace Andach\LaravelAttachmentsComments\Console;

use Spatie\LaravelPackageTools\Commands\InstallCommand as SpatieInstallCommand;

class InstallCommand extends SpatieInstallCommand
{
    protected $signature = 'andach/laravel-attachments-comments:install';

    protected $description = 'Install the Laravel Attachments Comments package';

    public function install()
    {
        // Your installation logic here
        $this->info('Installing Laravel Attachments Comments...');
        $this->info('Laravel Attachments Comments installed successfully.');
    }
}
