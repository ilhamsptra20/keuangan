<?php
    class Authentication extends Controller {
        public function login()
        {
            if ($_POST != []) {
                $data = $_POST;
                $data['password'] = md5($_POST['password']);
                $user = $this->model('User_model')->login($data);
                if ($user){
                    $_SESSION['nama'] = $user['nama'];
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['password'] = $user['password'];
                    header('Location: ' . BASEURL . 'home');
                }else{
                    Flasher::setLogin();
                    header('Location: ' . BASEURL . 'login');
                    exit;
                }
            }else{
                echo '<script> window.history.go(-1) </script>';
            }
        }

        public function logout()
        {
            session_destroy();
            session_unset();
            header('Location: ' . BASEURL . '');
        }

        public function register()
        {
            if ($_POST != []) {
                $data = $_POST;
                $data['password'] = md5($_POST['password']);
                if( $this->model('User_model')->register($data) > 0 ) {
                    $data['user_id'] = $this->model('User_model')->getId()['id'];
                    $data['saldo'] = 0;
                    $this->model('Saldo_model')->tambahDataSaldo($data);
                    Flasher::setFlash('berhasil', 'register', 'success');
                    header('Location: ' . BASEURL . 'login');
                    exit;
                } else {
                    Flasher::setFlash('gagal', 'register', 'danger');
                    header('Location: ' . BASEURL . 'login');
                    exit;
                }
            }
            else{
                echo '<script> window.history.go(-1) </script>';
            }
        }
    }