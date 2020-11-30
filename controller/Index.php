<?php
include "source/Controller.php";
include 'source/env_var.php';
class Index extends Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$this-> view -> set_view("view/home.php");
		$this-> view -> home();
	}
	public function login()
	{
		$this-> view -> set_view("view/login.php");
		$this-> view -> login();
	}
	public function register()
	{
		$this-> view -> set_view("view/register.php");
		$this-> view -> register();
	}
	public function chart()
	{
		$this-> view -> set_view("view/chart.php");
		$this-> view -> chart();
	}

	public function LOGIN_USER()
	{

		$username = $_POST['username'];
		$password = $_POST['password'];
		$logindata = array(
				'client_id' => $username,
				'client_secret' => $password
			);
		$logindata = json_encode($logindata);
		$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/json',
        'content' => $logindata
    	)
		);
		$context = stream_context_create($opts);
		$result = file_get_contents($GLOBALS['user_session_service']."/authentication/login/",false,$context);
		session_start();
		$logindata = json_decode($result);
		setcookie('bearer', $logindata->access_token, time() + (7200),"/");
		header("Location: ".dirname($_SERVER['PHP_SELF']));
	}

	public function REGISTER_USER()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$registerdata = array(
				'client_id' => $username,
				'client_secret' => $password
			);
		$registerdata = json_encode($registerdata);
		$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/json',
        'content' => $registerdata
    	)
		);
		$context = stream_context_create($opts);
		$result = file_get_contents($GLOBALS['user_session_service']."/authentication/register/",false,$context);
		header("Location: ".dirname($_SERVER['PHP_SELF']));
	}
	public function LOGOUT_USER()
	{
		$opts = array('http' =>
		array(
				'method'  => 'DELETE',
				'header'	=> 'Authorization: bearer '.$_COOKIE['bearer'],
			)
		);
		$context = stream_context_create($opts);
		$result = file_get_contents($GLOBALS['user_session_service']."/authentication/logout/",false,$context);
		unset($_COOKIE['bearer']);
    setcookie('bearer', null, -1, '/');
		header("Location: ".dirname($_SERVER['PHP_SELF']));
	}
}

 ?>
