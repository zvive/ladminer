<?php

namespace Ladminer;

use Illuminate\Support\Facades\Facade;

class LadminerFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ladminer';
    }
}
