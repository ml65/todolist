<?php
/*
 * Файловое хранилище задач
 */

namespace Mls65\Todolist\Repository;

use Mls65\Todolist\Interfaces\TodoRepositoryInterface;
use Mls65\Todolist\Entity\TodoEntity;

class TodoRepository  {

//    private $path;

    public function __construct()
    {
//        $this->path = dirname(dirname(dirname(__FILE__))).'/todo/';
    }

    public function createTask($todo)
    {
        if(!property_exists($todo,'id') || $todo->id == 0) { 
            $todo->id =  $this->getlastid() + 1;
        }
        try {
            $fc = fopen(dirname(dirname(dirname(__FILE__))).'/todo/'.$todo->id,"w");
            fwrite($fc, json_encode($todo,));
            fclose($fc);
            return true;
        } catch (Exception $e) {
            return false;
        };
    }

    static public function getTask($todo)
    {
        if(isset($todo->id)) {
            return $todo->init(json_decode(file_get_contents(dirname(dirname(dirname(__FILE__))).'/todo/'.$todo->id),true));
        } else {
            return false;
        }
    }

    static public function deleteTask($todo)
    {
        if(isset($todo->id)) {
            if(is_file(dirname(dirname(dirname(__FILE__))).'/todo/'.$todo->id)) {
                return unlink(dirname(dirname(dirname(__FILE__))).'/todo/'.$todo->id);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    static public function doCompleted($data)
    {
        $todo->status = "completed";
        return $this->createTask($todo);
    }

    static public function getTasks($todo)
    {
        $files = glob(dirname(dirname(dirname(__FILE__))).'/todo/'.'*');
        $list = array();
        foreach ($files as $f) {
            if(!preg_match('/index\.php/',$f)) {
                $td = $todo->init(json_decode(file_get_contents($f), true));
                $list[] = $td;
            }
        }
        return $list;

    }
    
    private function getlastid() {
        $id = 0;
        $files = glob(dirname(dirname(dirname(__FILE__))).'/todo/'.'*');
        foreach ($files as $f) {
            $i = basename($f);
            if(!preg_match('/index\.php/', $i)) {
                if($id < $i) {
                    $id = $i;
                }
            }
        }
        return (int) $id;
    }

}
