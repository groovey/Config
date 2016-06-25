# Config
A Silex 2.* service provider that uses the laravel/config component.


# Prerequisites

    // Folder config

    /config/localhost/app.php
    /config/localhost/database.php

    // app.php

    <?php
    return [
        'name' => 'Groovey'
    ];



# Usage

    $app = new Application();
    $app['debug'] = true;

    $app->register(new ConfigServiceProvider(), [
                'config.path'        => __DIR__.'/config',
                'config.environment' => 'LOCALHOST',
        ]);


    $app['config']->get('app.name');



# Using traits

    use Silex\Application;

    class App extends Application
    {
        use Groovey\Config\Traits\Config;
    }

    $app = new App();

    trait Config
    {
        public function config($setting, $default = '')
        {
            return $this['config']->get($setting, $default);
        }
    }


    $app->config('app.name');


