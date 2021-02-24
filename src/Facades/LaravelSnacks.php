<?php

namespace Galatanovidiu\LaravelSnacks\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelSnacks extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-snacks';
    }
}
