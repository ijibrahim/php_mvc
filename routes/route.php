<?php

use App\Base\Router;
use App\Controllers\PortfoliosController;
use App\Controllers\WelcomeController;

// SimpleRouter::get('/phpmvc', function() {
//     return 'Hello world';
// });

Router::get('/', [WelcomeController::class, 'hello']);
Router::get('portfolios', [PortfoliosController::class, 'index']);