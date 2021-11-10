<?php
session_start();
// Dit bestand hoort bij de router, en bevat nog een aantal extra functies je kunt gebruiken
// Lees meer: https://github.com/skipperbent/simple-php-router#helper-functions
require_once __DIR__ . '/route_helpers.php';

// Hieronder kun je al je eigen functies toevoegen die je nodig hebt
// Maar... alle functies die gegevens ophalen uit de database horen in het Model PHP bestand

/**
 * Verbinding maken met de database
 * @return \PDO
 */
function dbConnect() {

	$config = get_config( 'DB' );

	try {
		$dsn = 'mysql:host=' . $config['HOSTNAME'] . ';dbname=' . $config['DATABASE'] . ';charset=utf8';

		$connection = new PDO( $dsn, $config['USER'], $config['PASSWORD'] );
		$connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$connection->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC );

		return $connection;

	} catch ( \PDOException $e ) {
		echo 'Fout bij maken van database verbinding: ' . $e->getMessage();
		exit;
	}

}

/**
 * Geeft de juiste URL terug: relatief aan de website root url
 * Bijvoorbeeld voor de homepage: echo url('/');
 *
 * @param $path
 *
 * @return string
 */
function site_url( $path = '' ) {
	return get_config( 'BASE_URL' ) . $path;
}

function get_config( $name ) {
	$config = require __DIR__ . '/config.php';
	$name   = strtoupper( $name );

	if ( isset( $config[ $name ] ) ) {
		return $config[ $name ];
	}

	throw new \InvalidArgumentException( 'Er bestaat geen instelling met de key: ' . $name );
}

/**
 * Hier maken we de template engine en vertellen de template engine waar de templates/views staan
 * @return \League\Plates\Engine
 */
function get_template_engine() {

	$templates_path = get_config( 'PRIVATE' ) . '/views';

	$template_engine = new League\Plates\Engine( $templates_path );
	$template_engine->addFolder('layouts', $templates_path . '/layouts');

	return $template_engine;

}

/**
 * Geef de naam (name) van de route aan deze functie, en de functie geeft
 * terug of dat de route is waar je nu bent
 *
 * @param $name
 *
 * @return bool
 */
function current_route_is( $name ) {
	$route = request()->getLoadedRoute();

	if ( $route ) {
		return $route->hasName( $name );
	}

	return false;

}

function validate_form($data) {
	$errors = [];

	$username = trim($_POST['username']);
	$email    = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
	$password = trim($_POST['wachtwoord']);

	if (empty($username) || strlen( $username ) < 4 ){
		$errors['username'] = "Gebruikersnaam moet langer dan 4 tekens zijn!";
	}

	if ($email === false){
		$errors['email'] = "Ongeldig e-mailadres!";
	};

	if (empty($password) || strlen( $password ) < 6 ) {
		$errors['wachtwoord'] = "Wachtwoord moet langer dan 6 tekens zijn!";
	};

	$data = [
		'username' => $username,
		'email'    => $email,
		'password' => $password
	];

	return [
		'data' => $data,
		'errors' => $errors
	];
}

function notRegistered($username) {

	$connection = dbConnect();
	
	$sql        = "SELECT * from `gebruikers` WHERE `username` = :username";
	$statement  = $connection->prepare($sql);
	$statement->execute( ['username' => $username] );

	return ($statement->rowCount() === 0);
}

function createAccount($data) {

	$connection = dbConnect();
	
	$sql        = "INSERT INTO `gebruikers` (`username`, `admin`, `email`, `password`) VALUES (:username, 0, :email, :password)";
	$statement  = $connection->prepare($sql);
	$hashedpass = password_hash($data['password'], PASSWORD_DEFAULT);
	$params     = [
		'username' => $data['username'],
		'email'    => $data['email'],
		'password' => $hashedpass
	];
	$statement->execute($params);
}

function getUserById($id){

	$connection = dbConnect();
	$sql        = "SELECT * FROM `gebruikers` WHERE `id` = :id";
	$statement  = $connection->prepare($sql);
	$statement->execute( ['id' => $id]);

	if ($statement->rowCount() === 1) {
		return $statement->fetch();
	}

	return false;
}

function loggedInUser(){
	if (!loggedIn()){
		return false;
	};

	return getUserById($_SESSION['user_id']);
}

function loggedIn() {
	if (isset($_SESSION['user_id'])) {
		return true;
	}
	
	return false;
}

function notLoggedInYet(){
	if (!loggedIn()){
		redirect(url('login.form'));
	}
}

function getAllBlogPosts(){
	$connection = dbConnect();
	$sql = "SELECT * FROM `posts` ORDER BY `created_at` DESC";
	$statement = $connection->query($sql);

	return $statement->fetchAll();
}