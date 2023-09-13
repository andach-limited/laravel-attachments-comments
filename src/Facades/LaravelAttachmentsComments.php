<?php

namespace Andach\LaravelAttachmentsComments\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Andach\LaravelAttachmentsComments\LaravelAttachmentsComments
 */
class LaravelAttachmentsComments extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Andach\LaravelAttachmentsComments\LaravelAttachmentsComments::class;
    }
}
