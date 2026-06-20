<?php

session_start();

class Auth{
  
public static function check(){

  if(!isset($_SESSION['user_id'])){
    header('Location: /login');
    exit();
  }
 
}
public static function id(){
     return $_SESSION['user_id'];
}

}