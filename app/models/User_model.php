<?php

    class User_model {
        private $table = 'tbl_user';
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function getId()
        {
            $this->db->query('SELECT id FROM  tbl_user  ORDER BY id DESC');
            return $this->db->single();
        }

        public function login($data)
        {
            $this->db->query('SELECT * FROM ' . $this->table . ' WHERE email=:email AND password=:password');
            $this->db->bind('email', $data['email']);
            $this->db->bind('password', $data['password']);
            return $this->db->single();
        }

        public function register($data)
        {
            $query = "INSERT INTO tbl_user
                        VALUES
                    ('', :nama, :email, :password)";
            
            $this->db->query($query);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('email', $data['email']);
            $this->db->bind('password', $data['password']);

            $this->db->execute();

            return $this->db->rowCount();
        }
    }