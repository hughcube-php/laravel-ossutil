<?php
/**
 * Created by PhpStorm.
 * User: hugh.li
 * Date: 2021/4/20
 * Time: 11:45 下午.
 */

namespace HughCube\Laravel\OssUtil\Tests;

use HughCube\Laravel\OssUtil\Manager;
use HughCube\Laravel\OssUtil\OssUtil;
use HughCube\Laravel\OssUtil\ServiceProvider;

class FacadeTest extends TestCase
{
    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            ServiceProvider::class,
        ];
    }

    public function testIsFacade()
    {
        $this->assertInstanceOf(Manager::class, OssUtil::getFacadeRoot());
    }
}
