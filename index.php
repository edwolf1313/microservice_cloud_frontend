<?php
$url = array();
// $controllerName = "";
// $functionName = "";
$controllerName = "Index";
$functionName = "index";
require_once("controller/" .$controllerName. ".php");

$controller = new $controllerName(); //new Index();
$controller -> $functionName(); // index
