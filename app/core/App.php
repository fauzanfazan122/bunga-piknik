<?php

class App
{
   // default
   protected $controller = "Home";
   protected $method = "index";
   protected $params = [];

   public function __construct()
   {
      $url = $this->parseUrl();

      // check controller
      if (isset($url[0])) {
         if (file_exists("../app/controllers/" . $url[0] . ".php")) {
            $this->controller = $url[0];
            unset($url[0]);
         }
      }

      //buka dan buat objek home 
      require_once "../app/controllers/" . $this->controller . ".php";
      $this->controller = new $this->controller;

      //check method
      if (isset($url[1])) {
         if (method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
         }
      }

      //check parameter
      if (!empty($url)) {
         $this->params = array_values($url);
      }

      // jalankan controller, method dan parameter jika ada
      call_user_func_array([$this->controller, $this->method], $this->params);
   }

   //ambil url
   public function parseUrl()
   {
      if (isset($_GET['url'])) {
         $url = trim($_GET['url'], '/');
         $url = filter_var($url, FILTER_SANITIZE_URL);

         // convert to array
         $url = explode('/', $url);

         return $url;
      }
   }
}
