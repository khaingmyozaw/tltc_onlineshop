<?php

namespace Libs;

use PDO;
use PDOException;

class MySQL {
    private $dbhost;
    private $dbname;
    private $dbuser; 
    private $dbpass;
    private $db;

    // flexible host, name and account
    public function __construct(
        $dbhost = 'localhost',
        $dbname = 'phk_project',
        $dbuser = 'root',
        $dbpass = '',
    )
    {
        $this->dbhost = $dbhost;
        $this->dbname = $dbname;
        $this->dbuser = $dbuser;
        $this->dbpass = $dbpass;

    }

    // connect to the table
    public function  connect () 
    {
        try {
            $this->db = new PDO("mysql:dbhost=$this->dbhost;dbname=$this->dbname;",
                            "$this->dbuser", "$this->dbpass",
                            [
                                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                            ]
                        );
            return $this->db;
        }catch (PDOException $e) {
            $e->getMessage();
            exit();
        }

    }

}