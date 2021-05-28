<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../models/User.php';

class UserController extends AppController
{
    private $userRepository;
    private $messages = [];

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function addUser()
    {
        if($this->isPost()) {
            $user = new User($_POST['email'], md5($_POST['password']), $_POST['name'], $_POST['surname']);
            $this->userRepository->addUser($user);
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}");
        }else {
            $this->render('register', ['messages'=> $this->messages]);
        }
    }

    public function account() {
        $user = unserialize($_SESSION['tmp']);
        $this->render('account', ['user'=>$user]);
    }

}