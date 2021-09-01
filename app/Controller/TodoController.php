<?php

namespace Mls65\Todolist\Controller;

use Mls65\Todolist\Engine\Storage;
use Mls65\Todolist\Entity\TodoEntity;
use Carbon\Carbon;

class TodoController {

    /**
     * @var Request
     */
    private $request;
    private $response;
    private $todo;
    private $todorepo;
    
    public function __construct()
    {
// объект работы с запросом
        $this->request = Storage::get('Request');
// объект данных
        $this->todo = Storage::get('Entity');   
// репозиторий
        $this->todorepo = Storage::get('Repository');   
// объект работы с запросом
        $this->response = Storage::get('Response');
    }

    public function list()
    {
        $todolist = $this->todorepo->getTasks($this->todo);
        return $this->response->json($todolist);
    }

    public function create()
    {
        $this->todo = $this->todo->init($this->request->params);
        if($this->todorepo->createTask($this->todo)) {
            return $this->response->json([
                'status' => 'Ok',
            ]);
        } else {
            return $this->response->json([
                'status' => 'Error',
            ]);
        
        }
    }

    public function get()
    {
        $this->todo = $this->todo->init($this->request->params);
        return $this->response->json($this->todorepo->getTask($this->todo));
    }

    public function delete()
    {
        $this->todo = $this->todo->init($this->request->params);
        if($this->todorepo->deleteTask($this->todo)) {
            return $this->response->json([
                'status' => 'Ok',
            ]);
        } else {
            return $this->response->json([
                'status' => 'Error',
            ]);
        
        }
    }

    public function docompleted()
    {
        $this->todo = $this->todo->init($this->request->params);
        if($this->todorepo->doCompleted($this->todo)) {
            return $this->response->json([
                'status' => 'Ok',
            ]);
        } else {
            return $this->response->json([
                'status' => 'Error',
            ]);
        
        }
    }

}