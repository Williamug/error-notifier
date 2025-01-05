<?php

namespace Williamug\ErrorNotifier\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Williamug\ErrorNotifier\ErrorNotifier
 */
class ErrorNotifier extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Williamug\ErrorNotifier\ErrorNotifier::class;
    }
}
