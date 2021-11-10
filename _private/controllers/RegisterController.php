<?php

namespace Website\Controllers;

/**
 * Class WebsiteController
 *
 * Deze handelt de logica van de homepage af
 * Haalt gegevens uit de "model" laag van de website (de gegevens)
 * Geeft de gegevens aan de "view" laag (HTML template) om weer te geven
 *
 */
class RegisterController
{



	public function registrationForm()
	{

		$template_engine = get_template_engine();
		echo $template_engine->render('register');
	}

	public function registrationprocess()
	{


		$errors = [];

		$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
		$firstname = trim($_POST['firstname']);
		$lastname = trim($_POST['lastname']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);

		if ($email == false) {
			$errors['email'] = 'Geen geldig email ingevuld';
		}

		if (strlen($username) < 6) {
			$errors['username'] = 'Geen geldige username';
		}

		if (strlen($password) < 6) {
			$errors['password'] = 'Geen geldig wachtwoord';
		}

		if (strlen($firstname) > 20) {
			$errors['firstname'] = 'Geen geldig voornaam';
		}

		if (strlen($lastname) > 20) {
			$errors['lastname'] = 'Geen geldige achternaam';
		}



		if (count($errors) === 0) {

			$connection = dbConnect();
			$sql = "SELECT * FROM `users` where `email` = :email";
			$statement = $connection->prepare($sql);
			$statement->execute(['email' => $email]);


			if ($statement->rowCount() === 0) {
				$sql = "INSERT INTO `users` (`email`, `username`, `password`, `firstname`, `lastname`) VALUES (:email, :username, :password, :firstname, :lastname)";
				$statement = $connection->prepare($sql);
				$safe_password = password_hash($password, PASSWORD_DEFAULT);
				$params = [
					'email' => $email,
					'username' => $username,
					'password' => $safe_password,
					'firstname' => $firstname,
					'lastname' => $lastname
				];
				$statement->execute($params);
				echo "Klaar";
			} else {
				$errors['email'] = 'Dit gebruiker bestaat al';
			}
		} else {
		print_r($errors);
		}
	}

	public function login()
	{

		$template_engine = get_template_engine();
		echo $template_engine->render('login');
	}
}
