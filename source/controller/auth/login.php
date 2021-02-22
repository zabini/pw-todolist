<?php

require __DIR__ . "/../../../vendor/autoload.php";

use Firebase\JWT\JWT;
use Source\Model\User;
use Source\Utils\Helper;

if (empty($_REQUEST['email']) || empty($_REQUEST['password'])) {
    Helper::warning("Alguns dados não foram informados, verifique os campos!");
}

$model = new User();

$user = $model->find('email = :email', 'email=' . $_REQUEST['email'])->fetch(true);
if (is_null($user)) {
    Helper::warning("Login inválido, por favor, verifique seus dados!");
}

$user = reset($user);

if (!password_verify($_REQUEST['password'], $user->password)) {
    Helper::warning("Login inválido, por favor, verifique seus dados!");
}

Helper::success('Success', [
    'jwt' => JWT::encode([
        'email' => $user->email,
        'unique_id' => date('Y-m-d H:i:s'),
    ], JWT_KEY)
]);
