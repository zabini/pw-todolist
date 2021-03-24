<?php

use Source\Model\Task;
use Source\Utils\Helper;

require __DIR__ . "/../../../vendor/autoload.php";

$user = Helper::getAuthUser();

if (
    empty($_REQUEST['date'])        ||
    !date_create($_REQUEST['date'])
) {
    Helper::warning("O filtro data não foi informado!");
}

$filter = [
    'user_id' => $user->id,
    'date' => date_create($_REQUEST['date'])->format('Y-m-d'),
];

$task = new Task();

$tasks = $task->find('user_id = :user_id and date = :date', http_build_query($filter))
    ->fetch(true);
if ($task->fail()) {
    Helper::error("Erro ao executar busca nas tarefas! Erro: " . $task->fail()->getMessage());
}

Helper::success('Success', [
    'data' => array_map(function ($task) {
        return $task->data();
    }, $tasks)
]);
