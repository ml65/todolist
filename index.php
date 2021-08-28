<?php 

require 'vendor/autoload.php';

use Carbon\Carbon;
use Sabre\HTTP;
//use Mls65\Todolist\Repository;
//use Mls65\Todolist\Entity;

//https://packagist.org/packages/sabre/http
/*
function getMethod();
function getBody();
function getBodyAsString();
function getHeaders();
function getHeader($name);
function setHeader($name, $value);

function setStatus($status);
function setBody($body);

*/

$request = HTTP\Sapi::getRequest();

$method = $request->getMethod();
$param = $request->getQueryParameters();
$uri = $request->getUrl();
$protocol = $request->getHttpVersion();
$command = "none";

if(preg_match('/^\/(\w+)\/(\w+)/',$uri,$match)) {
    $object = strtolower($match[1]);
    $command = strtolower($match[2]);
}

if($object === "todo") {

    $td = new Mls65\Todolist\Entity\TodoEntityFiles($param);
    $todo = new Mls65\Todolist\Repository\TodoRepository($td);
    $code = 200;
    $body = "Ok";
    switch($command) {
        case "create":
            list($code, $body) = $todo->createTask($td);
            break;
        case "get":
            list($code, $body) = $todo->getTask($td);
            break;
        case "list":
            list($code, $body) = $todo->getTasks($td);
            break;
        case "iscompleted":
            list($code, $body) = $todo->doCompleted($td);
            break;
        case "delete":
            list($code, $body) = $todo->deleteTask($td);
            break;


    }
//echo "=code=",$code," ",$body," "; exit;
    $response = new HTTP\Response();
    $response->setStatus($code); // created !
    $response->setBody($body);
    HTTP\Sapi::sendResponse($response);

} 

