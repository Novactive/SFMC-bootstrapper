#!/usr/bin/env php
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

include __DIR__.'/../boostrap.php';

$page = $_SERVER['argv'][1];
if (file_exists("build/{$page}.css")) {
    $config += [
        'layout' => 'layout/raw.html.twig',
        'styles' => trim(file_get_contents("build/{$page}.css")),
        'javascripts' => trim(file_get_contents("./build/{$page}.js"))
    ];
}

// remove comment
echo preg_replace('#/\\*(.)*?\\*/#uim', '', $twig->render("{$page}.amps.twig", $config));

