<?php

declare(strict_types=1);

/**
  Пример реализации другого метода хранения данных
 */

namespace Mls65\Todolist\Entity;

use Mls65\Todolist\Entity\TodoEntity;

use Carbon\Carbon;

class TodoEntityFiles extends TodoEntity
{
   private $path = '';

    public function __construct($param) {
        $this->init($param);

    }

    public function update() {

    }

    public function save () {

    }

    public function get (int $id) {

    }

    public function delete (int $id) {

    }

    public function getlist() {

    }

}

