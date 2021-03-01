<?php

use Source\Model\Task;
use Source\Utils\Helper;

require __DIR__ . "/../../../vendor/autoload.php";

$user = Helper::getAuthUser();

if (empty($_REQUEST['id'])) {
    Helper::warning("O filtro id não foi informado!");
}

$task = new Task();

$taskResult = $task->findById($_REQUEST['id']);
if ($task->fail()) {
    Helper::error("Erro ao executar a busca pela tarefa! Erro: " . $task->fail()->getMessage());
}

if (is_null($taskResult) || $taskResult->user_id !== $user->id) {
    Helper::warning("Tarefa não encontrada!");
}

Helper::success('Success', [
    'data' => $taskResult->data()
]);
