<?php

class User {

    //db connection
    private $conn;
    private $table = 'users';

    //user properties
    public $id;
    public $username;
    public $password;
    public $display_name;
    public $created_at; 

    //constructor with db connection
    public function __construct($db) {
        $this->conn = $db;
    }
    
    //get all users and their pets from db
    public function getUsers() {
        //query
        $query = 'SELECT 
                id,
                username, 
                display_name, 
                created_at
                FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

}

?>