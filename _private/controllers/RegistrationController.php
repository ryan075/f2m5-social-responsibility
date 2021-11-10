<?php

namespace Website\Controllers;

/**
 * Class RegistrationController
 *
 * Deze handelt de registratie van gebruikers
 * Haalt gegevens uit de "model" laag van de website (de gegevens)
 * Geeft de gegevens aan de "view" laag (HTML template) om weer te geven
 *
 */
class RegistrationController {

	public function registrationForm() {

		$template_engine = get_template_engine();
		echo $template_engine->render('registration/index');

	}

    public function registrationHandler() {
        $result = validate_form($_POST);
        print_r($result['data']);

        if (count($result['errors']) === 0){


            if ( notRegistered( $result['data']['username'] ) ){

                createAccount($result['data']);
                
                redirect(url('register.success'));
            }
            else {
                $errors['username'] = 'Dit account bestaat al!';
            }
        }
        
        $template_engine = get_template_engine();
        echo $template_engine->render( 'registration/index', ['errors' => $result['errors']] );

    }

    public function registrationSuccess() {
        $template_engine = get_template_engine();
        echo $template_engine->render('registration/success');
    }
}

