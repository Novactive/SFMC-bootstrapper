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

$query = http_build_query($_GET);

$url = sprintf('%s?%s', $config['routes']['api'], $query);
$client = new Symfony\Component\HttpClient\CurlHttpClient();

// fill it manually here, that's the simplest
$cookieId = '';

try {
    if (strtolower($_SERVER['REQUEST_METHOD']) !== 'post') {
        echo $client->request($_SERVER['REQUEST_METHOD'],
                              $url,
                              [
                                  'headers' => [
                                      'Cookie' => 'sessionId='.$cookieId
                                  ],
                              ])->getContent();
    } else {
        echo $client->request($_SERVER['REQUEST_METHOD'],
                              $url,
                              [
                                  'headers' => [
                                      'Content-Type' => 'application/json; charset=utf-8',
                                      'Cookie' => 'sessionId='.$cookieId
                                  ],
                                  'body' => file_get_contents('php://input')
                              ])->getContent();

    }
} catch (\Exception $exception) {
    echo $exception->getMessage();
}
