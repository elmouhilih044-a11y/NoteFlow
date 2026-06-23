<?php

class Auth{
  
public static function check(){
  if (session_status() === PHP_SESSION_NONE) { session_start(); }
  if(!isset($_SESSION['user_id'])){
    header('Location: index.php?page=login');
    exit();
  }
 
}
public static function id(){
     return $_SESSION['user_id'];
}

}