<?php

require_once 'AppController.php';

class DefaultController extends AppController {
    public function index() {
        //TODO
        $this->render('login');
    }

    public function products() {
        //TODO
        $this->render('products');
    }

    public function recipes() {
        //TODO
        $this->render('recipes');
    }

    public function register() {
        //TODO
        $this->render('register');
    }

    public function map() {
        //TODO
        $this->render('map');
    }

    public function form() {
        //TODO
        $this->render('form');
    }

    public function account() {
        //TODO
        $this->render('account');
    }
}