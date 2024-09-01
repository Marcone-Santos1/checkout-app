<?php

use MiniRestFramework\config\Config;
use MiniRestFramework\Core\App;

use Dotenv\Dotenv;
use MiniRestFramework\Database\DatabaseConnection;
use MiniRestFramework\DI\Container;
use MiniRestFramework\DI\ContainerManager;
use MiniRestFramework\View\TemplateEngine;

$dotenv = Dotenv::createUnsafeImmutable(__DIR__ . '/../');
$dotenv->load();

$container = new Container();

$container->singleton(Config::class, function () {
    return new Config(dirname(__DIR__) . env('CONFIG_PATH'));
});

ContainerManager::set('container', $container);
ContainerManager::set('config', $container->get(Config::class));

$container->singleton(TemplateEngine::class, function () {
    return new TemplateEngine(config('app.views_path'));
});

ContainerManager::set('templateEngine', $container->get(TemplateEngine::class));

$container->singleton(DatabaseConnection::class, function () {
    return new DatabaseConnection(
        config('database'),
    );
});

$app = new App($container);

return $app;
