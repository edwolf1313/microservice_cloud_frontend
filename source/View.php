<?php
include "source/env_var.php";
class View
{
    protected $view="";
    protected $template= "";
    protected $assets_url="";
    protected $web_url="";
    protected $data = [];
    public function __construct()
    {
        $root = str_replace("/", "\\", $_SERVER["DOCUMENT_ROOT"]);
        // $path = realpath($root."/../assets");
        $this-> web_url = $GLOBALS['url'].dirname($_SERVER['PHP_SELF']);
        $this-> assets_url = $this-> web_url."/assets";
        // echo realpath(__dir__)."<br>";
        // echo $path."<br>";
        // echo $root;
        $this-> assets_url = str_replace("\\", "/", $this->assets_url);
        $this-> template = "template/layout.php";
    }
    public function set_view($view)
    {
        $this->view = $view;
    }

    public function set_data($data)
    {
        $this->data = $data;
    }
    public function home()
    {
        $product_data = $this->data;
        $current_view = $this->view;
        $assets_url= $this->assets_url;
        $web_url= $this->web_url;
        $product_url = $GLOBALS['product_services'];
        include $this->template;
    }
    public function product()
    {
        $product_data = $this->data;
        $current_view = $this->view;
        $assets_url= $this->assets_url;
        $web_url= $this->web_url;
        $product_url = $GLOBALS['product_services'];
        include $this->template;
    }
    public function chart()
    {
      $cart_data = $this->data;
      $current_view = $this->view;
      $web_url= $this->web_url;
      $product_url = $GLOBALS['product_services'];
      $assets_url= $this->assets_url;
      include $this->template;
    }
    public function login()
    {
      $current_view = $this->view;
      $web_url= $this->web_url;
      $assets_url= $this->assets_url;
      include $this->template;
    }
    public function register()
    {
      $current_view = $this->view;
      $web_url= $this->web_url;
      $assets_url= $this->assets_url;
      include $this->template;
    }
}
