<?php
require_once "config/Database.php";

class Note{
  public function findByUser($userId){
    $db=Database::getInstance();
    $stmt=$db->prepare("SELECT * FROM notes WHERE user_id= ? ORDER BY created_at DESC ");
    $stmt->execute([$userId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function findById($id){
    $db=Database::getInstance();
    $stmt=$db->prepare("SELECT * FROM notes WHERE id= ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
 
 public function create($userId,$title,$content){
    $db=Database::getInstance();
    $stmt=$db->prepare("INSERT INTO notes(user_id,title,content) VALUES (?,?,?)");
    return $stmt->execute([$userId,$title,$content]);
 }

  public function update($id,$title,$content){
    $db=Database::getInstance();
    $stmt=$db->prepare("UPDATE notes SET title=?,content=? WHERE id=?");
    return $stmt->execute([$title,$content,$id]);
 }

  public function delete($id){
    $db=Database::getInstance();
    $stmt=$db->prepare("DELETE notes WHERE id=?");
    return $stmt->execute([$id]);
 }
  

}