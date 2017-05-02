<?php

namespace App;

use Cache;

class Matriushka
{

    protected static $key;

    /**
     * @return string
     */
    public static function setUp($model)
    {
        ob_start();
        static::$key = $model->getCacheKey();
        return Cache::has(static::$key);
    }

    /**
     * @return string
     */
    public static function tearDown()
    {
//        $html = "prova";

        $html  = ob_get_clean();


        echo $html;
    }

}

