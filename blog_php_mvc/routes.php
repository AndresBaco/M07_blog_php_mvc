<?php
function call($controller, $action) {
 require_once('controllers/' . $controller . '_controller.php');
 switch($controller) {
	 case 'pages':
		$controller = new PagesController();
		break;
     case 'posts':
	 // necesitamos el modelo para después consultar a la BBDD
	// desde el controlador
		require_once('models/post.php');
		$controller = new PostsController();
	 break;
     case 'category': //He creat un nou cas per a les categories, que aniran en controladors i en models apart
        require_once('models/category.php');
		$controller = new CategoryController();
	 break;
 }
 // llama al método guardado en $action
 $controller->{ $action }();
}
// lista de controladores que tenemos y sus acciones
// consideramos estos valores "permitidos"
// agregando una entrada para el nuevo controlador y sus acciones.
$controllers = array( 'pages' => ['home', 'error'],
                     //S'han afegit noves accions. Les accions form son els formularis que s'utilitzaran per fer els inserts i els updates
					  'posts' => ['index', 'show','formInsert', 'insert', 'delete', 'formUpdate', 'update'], 
                     //he creat el nou controlador anomenat categoria per utilitzar i manipular una segona taula.
                      'category' => ['index','show','formInsert','insert','delete', 'update', 'formUpdate']);
// verifica que tanto el controlador como la acción solicitados estén permitidos
// Si alguien intenta acceder a otro controlador y/o acción, será redirigido al método de
//error del controlador de pages.
if (array_key_exists($controller, $controllers)) {
	if (in_array($action, $controllers[$controller])) {
		call($controller, $action);
	} else {
		call('pages', 'error');
	}
} else {
	call('pages', 'error');
}
?>
