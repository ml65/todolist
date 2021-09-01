<?php 

declare(strict_types=1);

/**
  Интерфейс репозитория
 */
 
namespace Mls65\Todolist\Interfaces;

interface TodoRepositoryInterface
{
     public function createTask(TodoEntity $todo);

     public function deleteTask(TodoEntity $todo);

     public function doCompleted(TodoEntity $todo);

     public function getTasks(TodoEntity $todo);

}