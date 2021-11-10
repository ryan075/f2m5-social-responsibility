<?php

namespace Website\Controllers;

class LoginController {

    public function loginForm() {
        if (isset($_SESSION['user_id'])) {
            redirect(url('admin.home'));
        }

        $template_engine = get_template_engine();
		echo $template_engine->render('login/index');
        
    }

    public function loginHandler() {
        $result = validate_form($_POST);

        if(notRegistered( $result['data']['username'])){
            $result['errors']['username'] = "Deze gebruiker bestaat niet. Registreer om een account aan te aanmaken.";
        } else {
            $user = getUserByEmail($result['data']['email']);

            if(password_verify($result['data']['password'], $user['password'])){
                
                $_SESSION['user_id'] = $user['id'];

                redirect(url('admin.home'));
            } else {
                $result['errors']['password'] = "Het gegeven wachtwoord is niet correct.";
            }
        }

        $template_engine = get_template_engine();
		echo $template_engine->render('login/index', ['errors' => $result['errors']]);
    }

    public function logoutHandler() {
        unset($_SESSION['user_id']);
        redirect(url('home'));
    }

}