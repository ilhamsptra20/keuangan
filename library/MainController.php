<?php 

class MainController extends Controller{
    public function __construct()
    {
        if (empty($_SESSION['email']) AND empty($_SESSION['password'])) {
            header('Location: '. BASEURL . 'login');
        }
    }
}