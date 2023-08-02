<?php 
	
	/**
	 * @var ["Instenciation de l'objet Router pour controller les urls de l'application "]
	 */
	$router = new Router(__url);

	/**
	 * @var ["On lance la capture des actions utilisateurs sur les URLs "]
	 */
	$router->run();

	/**
	 * @var ["On  récupere la page root de toute l'application  "]
	 */
	$page  = $router->getInitialPage();


	/**
	 * @var ["On  récupere le premier paramètre des urls sous-forme d'un identifiant "]
	 */
	$id    = $router->getInitialID();


	/**
	 * @var ["On  récupere tous les paramètres passés dans l'url sous forme du table indexé "]
	 */
	$options  = $router->getOptions();


	/**
	 * @requires ["Inclusion du controlleur global à toute l'application "]
	 */
	!empty(__bindController('global')) ? (require __bindController('global')): null;


	/**
	 * @requires ["Inclusion du controlleur de la page courante s'il existe "]
	 */
	!empty(__bindController($page)) ? (require __bindController($page)) :  null;


	/**
	 * @requires ["Inclusion des en-tête de toute l'application {FICHIER CSS - TITLE - META} "]
	 */
	require View::bind('head');

	
	/**
	 * @requires ["Inclusion du corps de la page courante "]
	 */
	require View::bind('body');


	/**
	 * @requires ["Inclusion du footer de toute l'application {FICHIER JS } "]
	 */
	require View::bind('foot');









 ?>