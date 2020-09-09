<?php
  spl_autoload_register("auto_class_register");
  function auto_class_register($classname){
    $url = $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
    if(strpos($url,"include") || strpos($url,"library") ){
      $path = "../library/".$classname.".class.php";
    }
    else{
      $path = "library/".$classname.".class.php";
    }
    if(!file_exists($path)){
      return "<br> !! class not found !! <br>";
    }
    include_once $path;
  }
