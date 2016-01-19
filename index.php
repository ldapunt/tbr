<?php
	ob_start();

	ini_set('display_errors', 1); 
	date_default_timezone_set('America/Sao_Paulo');

	define('DS', DIRECTORY_SEPARATOR);
	define('ROOT_PATH', dirname(__FILE__) . DS);
	define('APP_PATH', 'app' . DS);

	/**
	 * Verifica se o autoload do Composer está configurado
	 */
	$composer_autoload = 'vendor' . DS . 'autoload.php';

	if ( ! file_exists($composer_autoload)) {
		die('Execute o comando: composer install');
	}

	require_once($composer_autoload);

	//Start da sessão
	HXPHP\System\Services\StartSession::sec_session_start();

	//Inicio da aplicação
	$app = new HXPHP\System\App(require_once APP_PATH . 'config.php');
	$app->ActiveRecord();
	$app->run();