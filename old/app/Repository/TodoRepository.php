<?php 
//declare(strict_types=1);

/**
  Репозиторий реализованного функционала
 */
 
 namespace Mls65\Todolist\Repository;
 
 use Mls65\Todolist\Interfaces\TodoRepositoryInterface;
 use Mls65\Todolist\Interfaces\TodoEntityInterface;
 
 class TodoRepository implements TodoRepositoryInterface 
 {

     public function createTask(TodoEntityInterface $todo) {
        $todo->save();
        $status = array(
            "status" => "succes"
        );
        return array(200,json_encode($status,JSON_UNESCAPED_UNICODE+JSON_HEX_QUOT));
     }

     public function getTask(TodoEntityInterface $todo) {
        $param = $todo->get($todo->getid());
	return array(200, json_encode($param,JSON_UNESCAPED_UNICODE+JSON_HEX_QUOT));
     }

     public function doCompleted(TodoEntityInterface $todo) {
        $todo->setStatus("completed");
        $todo->update();
        $status = array(
            "status" => "succes"
        );
        return array(200,json_encode($status,JSON_UNESCAPED_UNICODE+JSON_HEX_QUOT));
     }

     public function deleteTask(TodoEntityInterface $todo) {
        if($todo->delete($todo->getid())) {
            $status = array(
                "status" => "succes"
            );
            $code = 200;
        } else {
            $status = array(
                "status" => "error"
            );
            $code = 404;
        }
        return array($code,json_encode($status,JSON_UNESCAPED_UNICODE+JSON_HEX_QUOT));
     }


     public function getTasks(TodoEntityInterface $todo) {
         return array(200,json_encode($todo->getlist(),JSON_UNESCAPED_UNICODE+JSON_HEX_QUOT));;
     }

  }