<?php 

declare(strict_types=1);

/**
  Интерфейс объекта данных
 */

namespace Mls65\Todolist\Interfaces;


interface TodoEntityInterface 
{
     public function save();

     public function delete(int $id);

     public function update();

     public function get(int $id);

     public function getid();

     public function getlist();

}