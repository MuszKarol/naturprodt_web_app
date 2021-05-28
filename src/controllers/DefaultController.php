<?php

require_once 'AppController.php';

class DefaultController extends AppController {
    public function index() {
        $this->render('login');
    }

    public function register() {
        $this->render('register');
    }

    public function map() {
        if(!isset($_SESSION['user']))
            header("Location: http://$_SERVER[HTTP_HOST]");
        else
            $this->render('map');
    }

    public function productForm() {
        if(!isset($_SESSION['user']))
            header("Location: http://$_SERVER[HTTP_HOST]");
        else
            $this->render('productForm');
    }

    public function recipeForm() {
        if(!isset($_SESSION['user']))
            header("Location: http://$_SERVER[HTTP_HOST]");
        else
            $this->render('recipeForm');
    }

}