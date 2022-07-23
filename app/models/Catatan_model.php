<?php

    class Catatan_model {
        private $table = 'tbl_catatan';
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        // Create Catatan
        public function tambahDataCatatan($data)
        {
            $query = "INSERT INTO $this->table
                        VALUES
                    ('', :user_id, :keterangan, :jenis, :nominal, :saldo, :tanggal)";
            
            $this->db->query($query);
            $this->db->bind('user_id', $data['user_id']);
            $this->db->bind('keterangan', $data['keterangan']);
            $this->db->bind('jenis', $data['jenis']);
            $this->db->bind('nominal', $data['nominal']);
            $this->db->bind('saldo', $data['saldo']);
            $this->db->bind('tanggal', $data['tanggal']);

            $this->db->execute();

            return $this->db->rowCount();
        }

        public function getCatatanByUser($user_id)
        {
            $this->db->query('SELECT * FROM  tbl_catatan WHERE user_id=:user_id ORDER BY id DESC');
             $this->db->bind('user_id', $user_id);
            return $this->db->resultSet();
        }
    }