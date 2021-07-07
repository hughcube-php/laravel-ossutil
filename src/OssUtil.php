<?php
/**
 * Created by PhpStorm.
 * User: hugh.li
 * Date: 2021/4/18
 * Time: 10:31 下午.
 */

namespace HughCube\Laravel\OssUtil;

use Illuminate\Support\Facades\Facade as IlluminateFacade;

/**
 * Class Package.
 *
 * @method static string getBin()
 * @method static string loadBin()
 * @method static string isX86()
 *
 * @see \HughCube\Laravel\OssUtil\Manager
 * @see \HughCube\Laravel\OssUtil\ServiceProvider
 */
class OssUtil extends IlluminateFacade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'OssUtil';
    }
}
