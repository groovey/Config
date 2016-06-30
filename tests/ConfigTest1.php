<?php

use Silex\Application;
use Groovey\Config\Providers\ConfigServiceProvider;

class configTest extends PHPUnit_Framework_TestCase
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

        $app['config']->set('app.debug', false);
        $cond = $app['config']->get('app.debug');
        $this->assertFalse($cond);
    }

    public function testDatabase()
    {
        $app = $this->init();

        $this->assertEquals('root', $app['config']->get('database.db.username'));
        $this->assertEquals('localhost', $app['config']->get('database.db.host'));
    }
}
