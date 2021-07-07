<?php
/**
 * Created by PhpStorm.
 * User: hugh.li
 * Date: 2021/4/20
 * Time: 11:45 下午.
 */

namespace HughCube\Laravel\OssUtil\Tests;

use HughCube\Laravel\OssUtil\Manager;

class ManagerTest extends TestCase
{
    /**
     * @dataProvider managerProvider
     */
    public function testInstanceOf($manager)
    {
        $this->assertInstanceOf(Manager::class, $manager);
    }

    /**
     * @dataProvider managerProvider
     * @param Manager $manager
     */
    public function testSetBin($manager)
    {
        $bin = md5(random_bytes(100));
        $this->assertSame($manager->setBin($bin)->getBin(), $bin);
    }

    /**
     * @dataProvider managerProvider
     * @param Manager $manager
     */
    public function testGetBin($manager)
    {
        $this->assertFileExists($manager->getBin());
    }

    /**
     * @dataProvider managerProvider
     * @param Manager $manager
     */
    public function testLoadBin($manager)
    {
        $this->assertFileExists($manager->loadBin());
    }

    /**
     * @dataProvider managerProvider
     * @param Manager $manager
     */
    public function testIsX86($manager)
    {
        $this->assertIsBool($manager->isX86());
    }

    /**
     * @return array[]
     */
    public function managerProvider()
    {
        return [
            [(new Manager())],
        ];
    }
}
