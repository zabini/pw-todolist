<?php

use Source\Model\Task;
use Source\Utils\Helper;

require __DIR__ . "/../../../vendor/autoload.php";

$user = Helper::getAuthUser();

if (
    empty($_REQUEST['description']) ||
    empty($_REQUEST['date'])        ||
    !date_create($_REQUEST['date'])
) {
    Helper::warning("Alguns dados não foram informados, verifique os campos!");
}

$task = new Task();

$task->user_id = $user->id;
$task->description = $_REQUEST['description'];
$task->date = date_create($_REQUEST['date'])->format('Y-m-d');

$result = $task->save();
if ($task->fail()) {
    Helper::error("Houve um erro ao tentar salver a tarefa. Erro: " . $task->fail()->getMessage());
}

Helper::success('Success', [
    'data' => $task->data()
]);
