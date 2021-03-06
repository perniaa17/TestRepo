<?php
use Silex\Provider\FormServiceProvider;

$app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/../../src/View/templates',
));

$app->register(new Silex\Provider\AssetServiceProvider(), array(
    'assets.version' => 'v1',
    'assets.version_format' => '%s?version=%s',
    'assets.named_packages' => array(
        'css' => array('base_path' => '/assets/css'),
        'js' => array('base_path' => '/assets/js'),
        'images' => array('base_urls' => array('http://silexapp.dev/assets/img')),
    ),
));

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver' => 'pdo_mysql',
        'dbname' => 'bd_practica',
        'user' => 'root',
        'password' => '1234'
    ),
));

$app->register(new Silex\Provider\HttpCacheServiceProvider(), array(
    'http_cache.cache_dir' => __DIR__ . '/../../var/cache/',
    'http_cache.esi' => null,
));

$app->register(new Silex\Provider\MonologServiceProvider(), array(
    'monolog.logfile' => __DIR__ . '/../../var/log/prog.log',
));

$app->register(new FormServiceProvider());