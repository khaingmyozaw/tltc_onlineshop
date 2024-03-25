<?php

namespace Libs;

use PDOException;

class MyTable {

    private $db;

    public function __construct(MySQL $mysql)
    {
        $this->db = $mysql->connect(); // connect to database that is got from parameter 
    }

    public function insert($data) 
    {
        try {
            $sql = "INSERT INTO customers (name, email, phone, age, gender, password, address, full_address, current_ip, device, created_at) 
            VALUES (:name,:email,:phone,:age,:gender,:password,:address,:full_address,:current_ip,:device,NOW())";

            $statement = $this->db->prepare($sql);  
            // because running with prepare method, real values wouldn't be run. This prevents sql injection
            $statement->execute($data);
            return $this->db->lastInsertId();
        }catch (PDOException $e) {
            $e->getMessage();
            exit();
        }
    }

    public function find($email) {
        try {
            $statement = $this->db->prepare("SELECT * FROM customers WHERE email=:email");
            $statement->execute([
                "email" => $email,
            ]);
            $user = $statement->fetch();

            return $user;
        }catch(PDOException $e) {
            $e->getMessage();
            exit();
        }
    }

    public function delete($id) {
        try {
            $statement = $this->db->prepare("DELETE FROM customers WHERE id=:id");
            $statement->execute([
                "id" => $id,
            ]);
            return $statement->rowCount();
        }catch(PDOException $e) {
            $e->getMessage();
            exit();
        }
    }

}