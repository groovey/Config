<?php

namespace Groovey\Traits;

trait Config
{
    public function config($setting, $default = '')
    {
        return $this['config']->get($setting, $default);
    }
}
