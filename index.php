<?php

use Source\Utils\Helper;

require_once __DIR__ . "/vendor/autoload.php";

$path = $_REQUEST['endpoint'];

if (explode("/", $path)[0] === "api") {

    $path = str_replace('.php', '', $path);
    $path = __DIR__ . '/' . str_replace('api', 'source/controller', $path) . ".php";

    if (file_exists($path)) {
        echo include $path;
        exit;
    } else {
        Helper::warning('Route not found');
    }
}

header('Location: /login');
