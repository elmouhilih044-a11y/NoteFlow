<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../core/Auth.php';

class ProfileController
{
    public function update()
    {
        Auth::check();
        $userModel = new User();
        $user = $userModel->findById(Auth::id());
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $currentPassword = $_POST['currentPassword'];
            


            if (empty($name) || empty($email) || empty($currentPassword)) {
                $error = "Tous les champs sont obligatoires";
                require __DIR__ . '/../views/profile/profile.php';
                return;
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = "Email invalide";
                require __DIR__ . '/../views/profile/profile.php';
                return;
            }

        if (!password_verify($currentPassword, $user['password'])) {
    $error = "Mot de passe incorrect";
    require __DIR__ . '/../views/profile/profile.php';
    return;
}
            $userModel->update($name,$email,Auth::id());
            header('Location: index.php?page=profile&action=update');
            exit();
        }
         require __DIR__ . '/../views/profile/profile.php';
    }
}
