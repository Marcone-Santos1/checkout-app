<?php

use MiniRestFramework\Core\App;

use MiniRestFramework\DI\Container;

$container = new Container();

$container->singleton(App::class, function() use ($container) {
    return new App($container);
});

$app = $container->make(App::class);
$app->setBasePath(dirname(__DIR__));

return $app;
