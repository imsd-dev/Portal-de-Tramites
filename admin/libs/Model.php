<?php

    class Model{
        
        function __construct() {
            //$this->db = new MySQLiManager(DB_HOST,DB_USER,DB_PASS,DB_NAME);
            $this->db = new PDOManager(DB_HOST,DB_NAME,DB_USER,DB_PASS);
        }
        
    }
