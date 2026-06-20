<?php
require_once __DIR__ . '/../models/User.php';

class AuthController
{
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmpassword'];
      

        if(empty($name) || empty($email) || empty($password) || empty($confirmPassword)){
            $error= "Tous les champs sont obligatoires";
            require __DIR__ . '/../views/auth/register.php';
            return;
        }

        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $error= "Email invalide";
            require __DIR__ . '/../views/auth/register.php';
            return;
        }

        if($password != $confirmPassword){
            $error= "Les mots de passe ne correspondent pas";
            require __DIR__ . '/../views/auth/register.php';
            return;
        }


    $userModel=new User();
    if($userModel->findByEmail($email)){
        $error= "Cet email est déjà utilisé";
         require __DIR__ . '/../views/auth/register.php';
            return;
    }

    if($userModel->create($name, $email, $password)){
        header('Location: index.php?page=login');
        exit();
    }
    $error= "Erreur lors de la création du compte";
}
  
        require __DIR__ . '/../views/auth/register.php';
}



}