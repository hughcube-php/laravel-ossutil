<?php
/**
 * Created by PhpStorm.
 * User: hugh.li
 * Date: 2021/4/20
 * Time: 4:19 下午.
 */

namespace HughCube\Laravel\OssUtil;

use Illuminate\Support\Str;

class Manager
{
    /**
     * @var string
     */
    protected $bin;

    /**
     * @param string $bin
     * @return $this
     */
    public function setBin($bin)
    {
        $this->bin = $bin;

        return $this;
    }

    /**
     * @return string
     */
    public function getBin()
    {
        if (null === $this->bin) {
            $this->bin = $this->loadBin();
        }

        return $this->bin;
    }

    /**
     * @return string
     */
    public function loadBin()
    {
        $bit = 4 == PHP_INT_SIZE ? 32 : 64;

        if (!$this->isX86()) {
            return dirname(__DIR__) . "/bin/ossutilarm{$bit}";
        } elseif ('WIN' === strtoupper(substr(PHP_OS, 0, 3))) {
            return dirname(__DIR__) . "/bin/ossutil{$bit}.exe";
        } elseif ("Darwin" === PHP_OS) {
            return dirname(__DIR__) . "/bin/ossutilmac{$bit}";
        }

        return dirname(__DIR__) . "/bin/ossutil{$bit}";
    }

    /**
     * @return bool
     */
    public function isX86()
    {
        ob_start();
        phpinfo();

        foreach ((array)explode(PHP_EOL, ob_get_clean()) as $line) {
            if (Str::contains(strtolower($line), 'system')
                && Str::contains(strtolower($line), 'release_x86')) {
                return true;
            }
        }

        return false;
    }
}
