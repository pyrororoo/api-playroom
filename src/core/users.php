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
    
    //get all users from db
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

    //gets a single user from the db
    public function getUser() {
        $query = 'SELECT 
                id,
                username, 
                display_name, 
                created_at
                FROM ' . $this->table . ' 
                WHERE id = ? 
                LIMIT 0,1';
        $stmt = $this->conn->prepare($query);
        $stmt->bindPAram(1, $this->id); //bind parameters
        $stmt->execute(); //execute query
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->username = $row['username'];
        $this->display_name = $row['display_name'];
        $this->created_at = $row['created_at'];
    }

    
}

?>