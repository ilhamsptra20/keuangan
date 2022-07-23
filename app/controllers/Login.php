<?php
    class Login extends Controller{
        public function index()
        {
            if (empty($_SESSION['email']) AND empty($_SESSION['password'])) {
                $this->view('layouts/header');
                $this->view('auth/login');
                $this->view('layouts/footer');
            }
            else{
                echo '<script> window.history.go(-1) </script>';
            }
        }
    }