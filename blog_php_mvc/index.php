<head>
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"> <!-- importem un estil de lletra -->
	<link rel="stylesheet" type="text/css" href="styles/style.css"><!-- CSS utilitzat-->
	<title>CRUD</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<?php
 if(isset($_GET['url'])){
 $url = $_GET['url']; // 'posts/index'
 // Quita / innecesarias a la derecha.
 $url = rtrim($url, '/');

 // Devuelve un array utilizando la / como delimitador.
 $url = explode('/', $url); // ['posts', 'index']
 }

 define('URL', 'http://localhost/blog_php_mvc/');

 require_once('connection.php');
 if (isset($_GET['controller']) && isset($_GET['action'])) {
	 $controller = $_GET['controller'];
	 $action = $_GET['action'];
 } else {
	 $controller = 'pages';
	 $action = 'home';
 }
 require_once('views/layout.php');
?>