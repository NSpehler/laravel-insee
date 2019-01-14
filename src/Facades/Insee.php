<?php

namespace NSpehler\LaravelInsee\Facades;

use Illuminate\Support\Facades\Facade;

class Insee extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-insee';
    }
}
