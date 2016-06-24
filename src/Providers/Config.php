<?php

namespace Groovey\Config\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Silex\Application;
use Silex\Api\BootableProviderInterface;
use Symfony\Component\Finder\Finder;
use Illuminate\Config\Repository;


class Config implements ServiceProviderInterface, BootableProviderInterface
{
    public function register(Container $app)
    {
        $app['config'] = function($app) {

            $path = $app['config.path'];
            $env  = $app['config.environment'];

            $folder = $path . '/' . strtolower($env);

            $phpFiles = Finder::create()->files()->name('*.php')->in($folder)->depth(0);

            foreach ($phpFiles as $file) {
                $files[basename($file->getRealPath(), '.php')] = require $file->getRealPath();
            }

            return new Repository($files);
        };
    }

    public function boot(Application $app)
    {
    }


}
