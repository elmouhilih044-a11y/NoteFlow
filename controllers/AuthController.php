<?php
require_once __DIR__ . '/../models/User.php';

class AuthController
{
    public function register()
    {
             // AJOUT : démarre la session seulement si elle n'est pas déjà active
        if (session_status() === PHP_SESSION_NONE) { session_start(); }
        // AJOUT : si l'utilisateur est déjà connecté, on le redirige vers ses notes
        if (isset($_SESSION['user_id'])) {
            header('Location: index.php?page=notes');
            exit();
        }
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

public function login(){
       // MODIFIÉ : avant c'était juste "session_start();" sans vérification
        if (session_status() === PHP_SESSION_NONE) { session_start(); }
        // AJOUT : si l'utilisateur est déjà connecté, on le redirige vers ses notes
        if (isset($_SESSION['user_id'])) {
            header('Location: index.php?page=notes');
            exit();
        }


if($_SERVER['REQUEST_METHOD']==='POST'){
    $email=trim($_POST['email']);
    $password=$_POST['password'];

    if(empty($email) || empty($password)){
        $error= "Tous les champs sont obligatoires";
        require __DIR__ . '/../views/auth/login.php';
        return;
    }

    $userModel=new User();
    $user=$userModel->findByEmail($email);
    if(!$user || !password_verify($password,$user['password'])){
        $error= "Email ou mot de passe incorrect";
        require __DIR__ . '/../views/auth/login.php';
        return;
    }

    $_SESSION['user_id']=$user['id'];
    $_SESSION['user_name']=$user['name'];
    header('Location: index.php?page=notes');
    exit();
}
 require __DIR__ . '/../views/auth/login.php';
}


public function logout(){
    session_start();
    session_destroy();
    header('Location: index.php?page=login');
    exit();
}

public function forgotPassword(){
    if($_SERVER['REQUEST_METHOD']==='POST'){
          $email = trim($_POST['email']);
        if (empty($email)) {
            $error = "Email obligatoire";
            require __DIR__ . '/../views/auth/forgot_password.php';
            return;
        }
        $userModel=new User();
        $user = $userModel->findByEmail($email);
         if (!$user) {
            $error = "Aucun compte trouvé";
            require __DIR__ . '/../views/auth/forgot_password.php';
            return;
        }
        $token=bin2hex(random_bytes(32));
        $userModel->saveResetToken($email,$token);
     $link = "index.php?page=reset_password&token=" . $token;

$success = "Un lien de réinitialisation a été généré pour les tests.";

             require __DIR__ . '/../views/auth/forgot_password.php';
             return;
    }
  require __DIR__ . '/../views/auth/forgot_password.php';
}

public function resetPassword(){
    $token=$_GET['token']??null;
    if(!$token){
           $error = "Token manquant";
        require __DIR__ . '/../views/auth/reset_password.php';
        return;
    }
        $userModel=new User();
        $user=$userModel->findByToken($token);
        if(!$user){
              $error = "Ce lien de réinitialisation est invalide ou a expiré";
        require __DIR__ . '/../views/auth/reset_password.php';
        return;
        }

        if($_SERVER['REQUEST_METHOD']==='POST'){
                    $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];
        
           if (empty($password) || empty($confirmPassword)) {
            $error = "Tous les champs sont obligatoires";
            require __DIR__ . '/../views/auth/reset_password.php';
            return;
        }

             if ($password !== $confirmPassword) {
            $error = "Les mots de passe ne correspondent pas";
            require __DIR__ . '/../views/auth/reset_password.php';
            return;
        }

        $userModel->updatePassword($user['id'],$password);
        header('Location: index.php?page=login');
        exit();
        }
          require __DIR__ . '/../views/auth/reset_password.php';
}

}