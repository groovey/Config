<?php

namespace Groovey\Config\Traits;

trait Config
{
    public function config($setting, $default = '')
    {
        return $this['config']->get($setting, $default);
    }
}
