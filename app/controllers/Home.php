<?php
    class Home extends Controller{
        public function index()
        {
            if(empty($_SESSION)){
                $this->view('layouts/header');
                $this->view('auth/login');
                $this->view('layouts/footer');
            }
            else{
                $data['catatan'] = $this->model('Catatan_model')->getCatatanByUser($_SESSION['id']);
                $data['saldo'] = $this->model('Saldo_model')->getSaldoByUser($_SESSION['id'])['saldo'];
                $this->view('layouts/header');
                $this->view('home/index', $data);
                $this->view('layouts/footer');
            }
        }
    }