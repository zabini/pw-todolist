<?php

namespace Source\Model;

use CoffeeCode\DataLayer\DataLayer;

class Task extends DataLayer
{
    public function __construct()
    {
        parent::__construct("tasks", ["user_id", "description", "date"]);
    }
}
