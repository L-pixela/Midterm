<?php

    require_once ('db_connection.php');

    if( $_SERVER['REQUEST_METHOD'] === 'GET'){
        $id = $_GET['id'];

        $db = new Database();
        $db->removeUser($id);

        header("Location: /Midterm/crud/index.php");
        exit;
    }