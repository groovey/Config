<?php

namespace Groovey\Traits;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Config\FileLoader;
use Illuminate\Config\Repository;

trait Config
{
    public function config($setting, $default = '')
    {
        return $this['config']->get($setting, $default);
    }
}
