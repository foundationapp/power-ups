<?php

namespace Foundationapp\PowerUps;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Foundationapp\PowerUps\Skeleton\SkeletonClass
 */
class PowerUpsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'power-ups';
    }
}
