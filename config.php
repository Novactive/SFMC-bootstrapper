<?php

/**
 * This file is part of the AlmaviaCX - SFMC-bootstrapper package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author    Novactive <dir.tech@novactive.com>
 * @copyright 2021 Almavia CX
 * @license   https://github.com/Novactive/SFMC-bootstrapper/blob/master/LICENSE MIT Licence
 */

$host = 'xxxxxx.pub.s50.sfmc-content.com';
$app = "https://{$host}/yyyy";
$api = "https://{$host}/kkkk";

$routes = [
    'app' => $app,
    'api' => $api
];

return [
    'routes' => $routes,
    'reactVars' => [
        // you can inject anything here, that'll be exposed to react
        'routes' => $routes,
        'host' => $host
    ]
];

