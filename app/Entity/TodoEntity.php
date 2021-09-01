<?php

declare(strict_types=1);

/**
  Базовый класс объекта данных
 */

namespace Mls65\Todolist\Entity;

use Carbon\Carbon;

class TodoEntity 
{

    /** @var string */
    public $id = '';

    /** @var \Carbon\Carbon */
    public $date = '';

    /** @var string */
    public $info = '';

    /** @var string */
    public $status = '';  // new, in_progress, completed ???

    public function __construct($param = null) 
    {
        if($param) $this->init($param);
        return $this;
    }
    
    public function init($param)
    {
        if(isset($param['id'])) $this->id = $param['id'];
        if(isset($param['date'])) $this->date = $param['date'];
        if(isset($param['info'])) $this->info = $param['info'];
        if(isset($param['status'])) $this->status = $param['status'];
        return $this;
    }

}

