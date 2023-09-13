<?php

namespace Andach\LaravelAttachmentsComments\Commands;

use Illuminate\Console\Command;

class LaravelAttachmentsCommentsCommand extends Command
{
    public $signature = 'laravel-attachments-comments';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
