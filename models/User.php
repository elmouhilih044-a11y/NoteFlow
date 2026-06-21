<?php
require_once 'config/Database.php';

class User
{

    public function findByEmail($email)
    {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM users WHERE email=?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($name, $email, $password)
    {
        $db = Database::getInstance();
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $db->prepare("INSERT INTO users(name,email,password) VALUES(?,?,?)");
        return $stmt->execute([$name, $email, $hashedPassword]);
    }

    public function update($name, $email, $id)
    {
        $db = Database::getInstance();
        $stmt = $db->prepare("UPDATE users SET name=?, email=? WHERE id=?");
        return $stmt->execute([$name, $email, $id]);
    }

    public function findByToken($token){
        $db=Database::getInstance();
        $stmt=$db->prepare("SELECT * FROM users WHERE reset_token=? AND reset_token_expiry > NOW()");
        $stmt->execute([$token]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findById($id)
{
    $db = Database::getInstance();
    $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function saveResetToken($email,$token){
    $db=Database::getInstance();
    $stmt=$db->prepare("UPDATE users SET reset_token=?, reset_token_expiry= DATE_ADD(NOW(),INTERVAL 1 HOUR) WHERE email=?");
    return $stmt->execute([$token,$email]);
}

public function updatePassword($user_id,$password){
$db = Database::getInstance();
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
      $stmt = $db->prepare(" UPDATE users SET password = ?,reset_token = NULL, reset_token_expiry = NULL WHERE id = ?");

        return $stmt->execute([$hashedPassword, $user_id]);
}

}