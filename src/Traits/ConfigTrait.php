<?php

namespace Groovey\Config\Traits;

trait ConfigTrait
{
    public function config($setting, $default = '')
    {
        return $this['config']->get($setting, $default);
    }
}
