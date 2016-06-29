## Config
A Silex 2 service provider that uses the Laravel's config component.


## Installation

    $ composer require groovey/config

## Usage

```php
use Groovey\Config\Providers\Config as ConfigServiceProvider;

$app = new Application();
$app['debug'] = true;

$app->register(new ConfigServiceProvider(), [
            'config.path'        => __DIR__.'/config',
            'config.environment' => 'LOCALHOST',
        ]);


$app['config']->set('app.name', 'Groovey')
$app['config']->get('app.name');
```

## Traits

```php
use Silex\Application;

class App extends Application
{
    use Groovey\Config\Traits\Config;
}

$app = new App();
$app->config('app.name');
```

## Sample Config File

```php
<?php

// config/localhost/app.php

return [
    'name' => 'Groovey',
    'debug' => true,
    'profile' => true,
    'translation' => true,
];
```


