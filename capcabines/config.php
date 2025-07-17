<?php
	//include('classes/MySql.php');
	session_start();
	date_default_timezone_set('America/Sao_Paulo');
	

	//Caminho: /home2/popgiv08/public_html/site

	define('INCLUDE_PATH','http://localhost/capcabines/'); //Colocar url do site, ex: 'https://www.site.com/site/'
	
	//Conectar com banco de dados
	define('HOST', 'localhost');
	define('USER', 'root'); //usuário
	define('PASSWORD', ''); //senha
	define('DATABASE', 'capcabines'); //database

?>