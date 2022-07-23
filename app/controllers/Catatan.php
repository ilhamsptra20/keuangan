<?php

    class Catatan extends MainController {
        public function pendapatan()
        {
            $saldoUser = $this->model('Saldo_model')->getSaldoByUser($_SESSION['id'])['saldo'];
            $data = $_POST;
            $data['user_id'] = $_SESSION['id'];
            $data['jenis'] = 1;
            $data['saldo'] = $saldoUser + (int)$data['nominal'];            

            if( $this->model('Catatan_model')->tambahDataCatatan($data) > 0 ) {
                $this->model('Saldo_model')->ubahSaldoUser($data);
                Flasher::setFlash('berhasil', 'ditambahkan', 'success');
                header('Location: ' . BASEURL . '');
                exit;
            } else {
                Flasher::setFlash('gagal', 'ditambahkan', 'danger');
                header('Location: ' . BASEURL . '');
                exit;
            }
        }

        public function pengeluaran()
        {
            $saldoUser = $this->model('Saldo_model')->getSaldoByUser($_SESSION['id'])['saldo'];
            $data = $_POST;
            $data['user_id'] = $_SESSION['id'];
            $data['jenis'] = 0;
            $data['saldo'] = $saldoUser - (int)$data['nominal'];           
            var_dump($data);
            // exit;
            if( $this->model('Catatan_model')->tambahDataCatatan($data) > 0 ) {
                $this->model('Saldo_model')->ubahSaldoUser($data);
                Flasher::setFlash('berhasil', 'ditambahkan', 'success');
                header('Location: ' . BASEURL . '');
                exit;
            } else {
                Flasher::setFlash('gagal', 'ditambahkan', 'danger');
                header('Location: ' . BASEURL . '');
                exit;
            }
        }

        public function get()
        {
            $data = $this->model('Aktivitas_model')->getAktivitasByUser(1);
            var_dump($data);
        }
    }