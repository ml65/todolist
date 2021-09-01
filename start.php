<?php

// Инициализация хранилища приложения

use Mls65\Todolist\App;
use Mls65\Todolist\Engine\Request;
use Mls65\Todolist\Engine\Response;
use Mls65\Todolist\Engine\Router;
use Mls65\Todolist\Engine\Storage;
use Mls65\Todolist\Entity\TodoEntity;
use Mls65\Todolist\Repository\TodoRepository;

Storage::set('Request',  new Request());
Storage::set('Response', new Response());
Storage::set('Router',   new Router());
Storage::set('Response', new Response());
Storage::set('Repository', new TodoRepository());
Storage::set('Entity',   new TodoEntity());
Storage::set('App',      new App());
