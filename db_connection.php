<?php

class Database{
    private $pdo;

    public function __construct()
    {
        $dsn = "mysql:host=localhost;dbname=crudadmin";
        $username = "root";
        $password = "";
        $this->pdo = new pdo($dsn,$username,$password);
    }

    public function getAllUsers(){

        $stmt =  $this->pdo->query("SELECT u.*,j.name AS job,g.gender AS gender FROM users u,occupation j,gender g where u.job_id = j.id AND u.gender_id = g.id");
        return $stmt->fetchAll(pdo::FETCH_ASSOC);

    }

    public function insertUser($last_name,$first_name,$email,$gender,$job_id){
        $stmt = $this->pdo->prepare("INSERT INTO users(last_name,first_name,email,gender_id,job_id) VALUES(?, ?, ?, ?, ?)");
        $stmt->execute([$last_name,$first_name,$email,$gender,$job_id]);
    }

    public function addJob($name){
        $stmt = $this->pdo->prepare("INSERT INTO occupation(name) VALUES(?)");
        $stmt->execute([$name]);
    }

    public function getUserbyId($id){
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id=?");
        $stmt->execute([$id]);

        return $stmt->fetch(pdo::FETCH_ASSOC);
    }

    public function removeUser($id){
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id=?");
        $stmt->execute([$id]);
    }

    public function updateUser($id,$last_name,$first_name,$email,$gender,$job_id){
        $stmt = $this->pdo->prepare("UPDATE users SET last_name= ?, first_name= ?,email= ?,gender_id= ?,job_id = ? where id= ?");
        $stmt->execute([$last_name,$first_name, $email,$gender, $job_id, $id]);
    }

    public function dropDownJob(){
        $stmt = $this->pdo->query("SELECT * FROM occupation");
        return $stmt->fetchAll(pdo::FETCH_ASSOC);
    }

    public function dropDownGender(){
        $stmt = $this->pdo->query("SELECT * FROM gender");
        return $stmt->fetchAll(pdo::FETCH_ASSOC);
    }

}

?>