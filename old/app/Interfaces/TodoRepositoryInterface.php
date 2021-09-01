<?php 

declare(strict_types=1);

/**
  Интерфейс репозитория
 */
 
namespace Mls65\Todolist\Interfaces;

interface TodoRepositoryInterface
{
     public function createTask(TodoEntityInterface $todo);

     public function deleteTask(TodoEntityInterface $todo);

     public function doCompleted(TodoEntityInterface $todo);

     public function getTasks(TodoEntityInterface $todo);

}