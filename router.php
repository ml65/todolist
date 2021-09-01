<?php

/*
 * Роутер приложения
 */

use Mls65\Todolist\Engine\Storage;
 
try {

    $router = Storage::get('Router');
    $router->get('/todo/create','TodoController@create');
    $router->get('/todo/get','TodoController@get');
    $router->get('/todo/list','TodoController@list');
    $router->get('/todo/iscompleted','TodoController@iscompleted');
    $router->get('/todo/delete','TodoController@delete');
} catch (\Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}