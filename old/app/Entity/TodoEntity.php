<?php

declare(strict_types=1);

/**
  Базовый класс объекта данных
 */

namespace Mls65\Todolist\Entity;

use Mls65\Todolist\Interfaces\TodoEntityInterface;
use Carbon\Carbon;

class TodoEntity implements TodoEntityInterface
{

    /** @var string */
    public $id = '';

    /** @var \Carbon\Carbon */
    public $date = '';

    /** @var string */
    public $info = '';

    /** @var string */
    public $status = '';  // new, in_progress, completed ???

    public function __consturct($param) {
        if(is_array($param)) {
            $this->init($param);
            $this->path = dirname(dirname(dirname(__FILE__))).'/todo/';
        }
        return $this;
    }

   public function init($param) {
        if(isset($param['id'])) {
            $this->id = $param['id'];
        } else {
            $this->id = 0;        
        }
        if(isset($param['date'])) {
            $this->date = $param['date'];
        } else {
            $this->date = Carbon::now('Europe/Moscow');
        }
        if(isset($param['info'])) {
            $this->info = $param['info'];
        } else {
            $this->info = '';
        }
        if(isset($param['status'])) {
            $this->status = $param['status'];
        } else {
            $this->status = 'new';
        }
        return $this;
    }

    public function save() {

    }

    public function delete(int $id){

    }
    public function update(){

    }
    public function setStatus(string $status){
        $this->status = $status;
    }

    public function getid() {
	return $this->id;
    }

    public function get(int $id){

    }
    public function getlist(){
   
    }


}

