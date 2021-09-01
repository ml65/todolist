<?php

declare(strict_types=1);

/**

 Метод хранения задач в файлах в json

 */

namespace Mls65\Todolist\Entity;

use Mls65\Todolist\Entity\TodoEntity;

use Carbon\Carbon;

class TodoEntityFiles extends TodoEntity
{
   private $path = '';

    public function __construct($param) {
        $this->init($param);
        $this->path = dirname(dirname(dirname(__FILE__))).'/todo/';
    }

    public function update() {
        return $this->save();
    }

    public function save () {
        if(!isset($this->id) || $this->id == 0) $this->id = $this->getlastid() + 1;
        $fc = fopen($this->path.$this->id,"w");
        fwrite($fc,json_encode($this));
        fclose($fc);
        return $this;
    }

    public function get (int $id) {
        if(!$id) $id = $this->getlastid();
        $param = json_decode(file_get_contents($this->path.$id), true);
        $this->init($param);
        return $this;
    }

    public function delete (int $id) {
        if($id) {
            if(is_file($this->path.$id)) {
                return unlink($this->path.$id);
            } else {
                return false;
            }
        }
    }

    private function getlastid() {
        $id = 0;
        $files = glob($this->path.'*');
        foreach ($files as $f) {
	    $i = basename($f);
            if(!preg_match('/index\.php/',$i)) {
                if($id < $i) {
                    $id = $i;
                }
            }
        }
        return (int) $id;
    }

    public function getlist() {
        $files = glob($this->path.'*');
        $list = array();
        foreach ($files as $f) {
            if(!preg_match('/index\.php/',$f)) {
                $td = new $this(json_decode(file_get_contents($f), true));
                $list[] = $td;
            }
        }
        return $list;
    }

}

