<?php

use Silex\Application;
use Groovey\Config\Providers\Config as ConfigServiceProvider;

class ConfigTest extends PHPUnit_Framework_TestCase
{
    private function init()
    {
        $app = new Application();
        $app['debug'] = true;

        $app->register(new ConfigServiceProvider(), [
                'config.path'        => __DIR__.'/config',
                'config.environment' => 'LOCALHOST',
            ]);

        return $app;
    }

    public function testApp()
    {
        $app = $this->init();

        $this->assertEquals('Groovey', $app['config']->get('app.name'));
        $this->assertTrue($app['config']->get('app.debug'));
    }

    public function testDatabase()
    {
        $app = $this->init();

        $this->assertEquals('root', $app['config']->get('database.mysql.username'));
        $this->assertEquals('88.88.88.88', $app['config']->get('database.mysql.host'));
    }
}
