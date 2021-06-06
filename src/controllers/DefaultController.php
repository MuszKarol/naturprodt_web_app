<?php

require_once 'AppController.php';

class DefaultController extends AppController
{
    public function index()
    {
        $this->render('login');
    }

    public function register()
    {
        $this->render('register');
    }

    public function map()
    {
        parent::sessionCheck();
        $this->render('map');
    }

    public function productForm()
    {
        parent::sessionCheck();
        $this->render('productForm');
    }

    public function recipeForm()
    {
        parent::sessionCheck();
        $this->render('recipeForm');
    }

}