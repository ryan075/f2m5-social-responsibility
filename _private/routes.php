<?php

use Pecee\Http\Request;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;
use Pecee\SimpleRouter\SimpleRouter;
use Website\Middleware\IsAuthenticated;
use Website\Middleware\IsAdmin;

SimpleRouter::setDefaultNamespace( 'Website\Controllers' );

SimpleRouter::group( [ 'prefix' => site_url() ], function () {

	// START: Zet hier al eigen routes (alle URL's die je op je website hebt) en welke controller en functie deze pagina afhandelt
	// Lees de docs, daar zie je hoe je routes kunt maken: https://github.com/skipperbent/simple-php-router#routes

	SimpleRouter::group(['prefix' => '/'] , function(){
		SimpleRouter::get( '/', 'WebsiteController@home' )->name( 'home' );
		SimpleRouter::get( '/overons', 'WebsiteController@about' )->name( 'about' );
	});


	SimpleRouter::group(['prefix' => '/registreren'] , function(){
		SimpleRouter::get( '/', 'RegistrationController@registrationForm' )->name( 'register.form' );
		SimpleRouter::post( '/handle', 'RegistrationController@registrationHandler' )->name( 'register.handle' );
		SimpleRouter::get( '/success', 'RegistrationController@registrationSuccess' )->name( 'register.success' );
	});

	SimpleRouter::group(['prefix' => '/admin', 'middleware' => Website\Middleware\IsAdmin::class] , function(){
		SimpleRouter::get( '/', 'AdminController@adminHome' )->name( 'admin.home' );
	});

	SimpleRouter::group(['prefix' => '/login'] , function(){
		SimpleRouter::get( '/', 'LoginController@loginForm' )->name( 'login.form' );
		SimpleRouter::post( '/handle', 'LoginController@loginHandler' )->name( 'login.handle' );
	});

	SimpleRouter::get( '/logout', 'LoginController@logoutHandler')->name( 'logout' );

	SimpleRouter::group(['prefix' => '/dashboard', 'middleware' => Website\Middleware\IsAuthenticated::class] , function(){
		SimpleRouter::get( '/', 'StdUserController@userDashboard' )->name( 'std.home' );
	});

	// STOP: Tot hier al je eigen URL's zetten, dit stukje laat de 4040 pagina zien als een route/url niet kan worden gevonden.
	SimpleRouter::get( '/not-found', function () {
		http_response_code( 404 );
		return 'ERROR 404 Page Not Found';
	} );

} );


// Dit zorgt er voor dat bij een niet bestaande route, de 404 pagina wordt getoond (die hierboven als route staat ingesteld)
SimpleRouter::error( function ( Request $request, \Exception $exception ) {
	if ( $exception instanceof NotFoundHttpException && $exception->getCode() === 404 ) {
		response()->redirect( site_url() . '/not-found' );
	}

} );

