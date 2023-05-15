<?php

use App\Controllers\PageController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes) {

    // WEB для всіх
    $routes->import('../src/Controllers', 'annotation')
        ->prefix('/{_locale}')
        ->namePrefix('web_public_')
        ->methods(['GET', 'HEAD'])
        ->requirements(['_locale' => 'uk|ru|en']);

    // Головна
    $routes->add('web_public_main', '/{locale?}')
        ->controller([PageController::class, 'main'])
        ->methods(['GET', 'HEAD'])
        ->requirements(['locale' => '(ru|en)?']);
};
