<?php

namespace Iamhabbeboy\Subscriber\Facades;

use Illuminate\Support\Facades\Facade;

class Subscriber extends Facade
{
    /**
     * Register component name
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'subscriber';
    }
}
