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

include __DIR__.'/boostrap.php';

function between(string $string, string $start, string $end): string
{
    $ini = strpos($string, $start);
    if ($ini === false) {
        return '';
    }
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;

    return substr($string, $ini, $len);
}

ob_start(function ($buffer) {

    while (($code = between($buffer, '%%[', ']%%')) !== '') {
        $buffer = str_replace("%%[{$code}]%%", "<pre class='code'>{$code}</pre>", $buffer);
    }

    return $buffer;

});

$page = ltrim($_SERVER['argv'][1] ?? $_SERVER['PATH_INFO'] ?? '/app', '/');

if (file_exists("./build/{$page}.css")) {
    $config += [
        'layout' => 'layout/web.html.twig',
        'styles' => trim(file_get_contents("./build/{$page}.css")),
        'javascripts' => trim(file_get_contents("./build/{$page}.js")),
    ];
}
echo $twig->render("{$page}.amps.twig", $config);

ob_end_flush();
