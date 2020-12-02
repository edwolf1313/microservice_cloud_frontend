<?php
include "source/Controller.php";
include 'source/env_var.php';
class Index extends Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$this-> view -> set_data($this-> all_product());
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
	public function cart()
	{
		if (!isset($_COOKIE['bearer'])) {
			header("Location: ".dirname($_SERVER['PHP_SELF'])."/index/login");
		}
		$this-> view -> set_data($this-> get_cart_list());
		$this-> view -> set_view("view/chart.php");
		$this-> view -> chart();
	}
	public function add_to_cart()
	{
		if (!isset($_COOKIE['bearer'])) {
			header("Location: ".dirname($_SERVER['PHP_SELF']));
		}
		$product_id = $_POST['product_id'];
		$quantity = $_POST['quantity'];
		$cartdata = array(
				'product_id' => $product_id,
				'quantity' => $quantity,
		);
		$cartdata = json_encode($cartdata);
		$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => array(
						'Content-type: application/json',
						'Authorization: bearer '.$_COOKIE['bearer'],
						'Connection: keep-alive',
						'Cache-Control: no-cache',
				),
        'content' => $cartdata,
				'timeout' => 5
    	)
		);
		$_SESSION['cart'] = $cartdata;
		$context = stream_context_create($opts);
		$result = file_get_contents($GLOBALS['user_cart_service']."/client/chart/",false,$context);
		header("Location: ".dirname($_SERVER['PHP_SELF'])."/index/cart");
	}

	public function get_cart_list(){
		if (!isset($_COOKIE['bearer'])) {
			header("Location: ".dirname($_SERVER['PHP_SELF']));
		}
		$opts = array('http' =>
		array(
				'method'  => 'GET',
				'header'  => 'Content-type: application/json',
				'header'	=> 'Authorization: bearer '.$_COOKIE['bearer'],
			)
		);
		$context = stream_context_create($opts);
		$result = file_get_contents($GLOBALS['user_cart_service']."/client/chart/",false,$context);
		return json_decode($result);
	}

	public function update_cart_list(){
		if (!isset($_COOKIE['bearer'])) {
			header("Location: ".dirname($_SERVER['PHP_SELF']));
		}
		$cartdata = array(
				'product_id' => $_POST['product_id'],
				'quantity' => $_POST['quantity'],
			);
		$cartdata = json_encode($cartdata);
		$opts = array('http' =>
    array(
        'method'  => 'PUT',
				'header'  => array(
						'Content-type: application/json',
						'Authorization: bearer '.$_COOKIE['bearer'],
						'Connection: keep-alive',
						'Cache-Control: no-cache',
				),
        'content' => $cartdata,
				'timeout' => 5
    	)
		);
		$context = stream_context_create($opts);
		$result = file_get_contents($GLOBALS['user_cart_service']."/client/chart/".$_POST['chart_id']."/",false,$context);
		header("Location: ".dirname($_SERVER['PHP_SELF'])."/index/cart");
	}

	public function delete_cart_list(){
		if (!isset($_COOKIE['bearer'])) {
			header("Location: ".dirname($_SERVER['PHP_SELF']));
		}
		// $cartdata = array(
		// 		'chart_id' => $_POST[''],
		// 	);
		// $cartdata = json_encode($cartdata);
		$opts = array('http' =>
    array(
        'method'  => 'DELETE',
				'header'  => array(
						'Content-type: application/json',
						'Authorization: bearer '.$_COOKIE['bearer'],
						'Connection: keep-alive',
						'Cache-Control: no-cache',
				),
				'timeout' => 5,
        // 'content' => $cartdata
    	)
		);
		$context = stream_context_create($opts);
		$result = file_get_contents($GLOBALS['user_cart_service']."/client/".$_POST['chart_id']."/chart/delete/",false,$context);
		header("Location: ".dirname($_SERVER['PHP_SELF'])."/index/cart");
	}

	public function product_page()
	{
		$this-> view -> set_data($this-> detail_product());
		$this-> view -> set_view("view/detail_product.php");
		$this-> view -> product();
	}
	public function search_page()
	{
		$this-> view -> set_data($this-> search_product());
		$this-> view -> set_view("view/home.php");
		$this-> view -> home();
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
		if($logindata->access_token){
			setcookie('username',$_POST['username'], time() + (7200),"/");
		}
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
		setcookie('username', null, -1, '/');
		header("Location: ".dirname($_SERVER['PHP_SELF']));
	}

	public function all_product()
	{
		$opts = array('http' =>
		array(
				'method'  => 'GET',
			)
		);
		$context = stream_context_create($opts);
		$result = json_decode(file_get_contents($GLOBALS['product_services']."/product_api/product-list/",false,$context));
		return $result;
	}

	public function detail_product()
	{
		$opts = array('http' =>
		array(
				'method'  => 'GET',
			)
		);
		$context = stream_context_create($opts);
		$result = json_decode(file_get_contents($GLOBALS['product_services']."/product_api/product-detail/".$_GET['id'],false,$context));
		return $result;
	}

	public function search_product()
	{
		$opts = array('http' =>
		array(
				'method'  => 'GET',
			)
		);
		$context = stream_context_create($opts);
		$result = json_decode(file_get_contents($GLOBALS['product_services']."/product_api/product-search/".$_GET['name'],false,$context));
		return $result;
	}

}
?>
