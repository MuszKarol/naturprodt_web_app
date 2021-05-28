<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../models/User.php';

class SecurityController extends AppController {

    public function login() {
        $userRepository = new UserRepository();

        if(!$this->isPost()) {
            return $this->login('login');
        }

        $email = $_POST["email"];
        $password = $_POST["password"];

        $user = $userRepository->getUser($email);

        if(!$user) {
            return $this->render('login', ['messages'=>'User not exist!']);
        }

        if($user->getEmail() !== $email){
            return $this->render('login', ['messages'=>'User with this email not exist!']);
        }
        if($user->getPassword() !== md5($password)){
            return $this->render('login', ['messages'=>'Incorrect password!']);
        }


        $_SESSION['tmp'] = serialize($user);
        //session_write_close();


        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/products");
    }

    public function logout(){
        session_destroy();
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}");
    }
}