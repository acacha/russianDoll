<?php

namespace App;

use Cache;

class Matriushka
{

    protected static $keys = [];

    /**
     * @return string
     */
    public static function setUp($model)
    {
        static::$keys[] = $key = $model->getCacheKey();

        ob_start();

        return Cache::tags('views')->has($key);
    }

    /**
     * @return string
     */
    public static function tearDown()
    {
        $key = array_pop(static::$keys);

        $html  = ob_get_clean();

        return Cache::tags('views')
            ->rememberForever($key, function () use ($html) {
                return $html;
        });
    }

}

