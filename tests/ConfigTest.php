<?php

use Silex\Application;
use Groovey\Config\Providers\ConfigServiceProvider;

class ConfigTest extends PHPUnit_Framework_TestCase
{
    public $app;

    public function setUp()
    {
        $app = new Application();
        $app['debug'] = true;

        $app->register(new ConfigServiceProvider(), [
                'config.path'        => __DIR__.'/../config',
                'config.environment' => 'localhost',
            ]);

        return $this->app = $app;
    }

    public function testApp()
    {
        $app = $this->app;

        $this->assertEquals('Groovey', $app['config']->get('app.name'));
        $this->assertTrue($app['config']->get('app.debug'));

        $app['config']->set('app.debug', false);
        $cond = $app['config']->get('app.debug');
        $this->assertFalse($cond);
    }

    public function testDatabase()
    {
        $app = $this->app;

        $this->assertEquals('root', $app['config']->get('database.db.username'));
        $this->assertEquals('localhost', $app['config']->get('database.db.host'));
    }
}
