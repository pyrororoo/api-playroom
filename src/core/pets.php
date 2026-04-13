<?php

class Pet {

    //db connection
    private $conn;
    private $table = 'pets';

    //pet properties
    public $id;
    public $pet_name;
    public $pet_type;
    public $user_id;

    //constructor with db connection
    public function __construct($db) {
        $this->conn = $db;
    }

    public function getPets() {
        //query
        $query = 'SELECT 
                p.id AS pet_id,
                p.pet_name, 
                p.pet_type, 
                p.user_id
                u.display_name AS owner_name
                u.username AS owner_username
                FROM ' . $this->table 'p
                LEFT JOIN users u ON p.user_id = u.id';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;

}

?>