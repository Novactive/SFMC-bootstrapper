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

require_once __DIR__.'/vendor/autoload.php';

use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\HtmlDumper;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFunction;

$loader = new FilesystemLoader(__DIR__."/src/pages");
$twig = new Environment($loader);

$twig->addFunction(
    new TwigFunction(
        'echo', function ($var) {
        return '%%=v('.$var.')=%%';
    }
    )
);

$twig->addFunction(
    new TwigFunction(
        'dump', function ($var) {
        $cloner = new VarCloner();
        $dumper = new HtmlDumper();

        return $dumper->dump($cloner->cloneVar($var));
    }
    )
);

$config = include __DIR__."/config.php";
