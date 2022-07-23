<?php

class Saldo_model {
    private $table = 'tbl_saldo';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getSaldoByUser($user_id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE user_id=:user_id');
        $this->db->bind('user_id', $user_id);
        return $this->db->single();
    }

    public function tambahDataSaldo($data)
    {
        $query = "INSERT INTO tbl_saldo
                    VALUES
                  ('', :user_id, :saldo)";
        
        $this->db->query($query);
        $this->db->bind('user_id', $data['user_id']);
        $this->db->bind('saldo', $data['saldo']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataSaldo($id)
    {
        $query = "DELETE FROM tbl_saldo WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahSaldoUser($data)
    {
        $query = "UPDATE tbl_saldo SET
                    saldo = :saldo
                  WHERE user_id = :user_id";
        
        $this->db->query($query);
        $this->db->bind('saldo', $data['saldo']);
        $this->db->bind('user_id', $data['user_id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}