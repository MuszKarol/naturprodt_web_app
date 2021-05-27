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
        $this->render('map');
    }

    public function productForm() {
        $this->render('productForm');
    }

    public function recipeForm() {
        $this->render('recipeForm');
    }

    public function account() {
        $this->render('account');
    }
}