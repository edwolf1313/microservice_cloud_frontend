<?php
$url = array();
$controllerName = "Index";
$functionName = "index";
if(isset($_GET['path'])){
  $url = explode("/",$_GET['path']);

  if(count($url)>1 && $url[1]!=""){
    $controllerName = $url[0];
		$functionName = $url[1];
	}
}

session_start();

require_once("controller/" .$controllerName. ".php");

$controller = new $controllerName(); //new Index();
$controller -> $functionName(); // index
