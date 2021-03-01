<?php

use Source\Model\User;
use Source\Utils\Helper;

require __DIR__ . "/../../../vendor/autoload.php";

if (
    empty($_REQUEST['name']) ||
    empty($_REQUEST['email']) ||
    empty($_REQUEST['password'])
) {
    Helper::warning("Alguns dados não foram informados, verifique os campos!");
}

$existUser = (new User())->find('email = :email', 'email=' . $_REQUEST['email'])->fetch(true);
if (!is_null($existUser)) {
    Helper::warning("Esse email já está sendo utilizado!");
}

$user = new User();

$user->name = $_REQUEST['name'];
$user->email = $_REQUEST['email'];
$user->password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);

$userId = $user->save();

if (!is_null($user->fail())) {
    Helper::warning($user->fail()->getMessage());
}

Helper::success('Success');
