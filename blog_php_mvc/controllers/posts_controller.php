<?php
class PostsController {
 public function index() {
	 // Guardamos todos los posts en una variable
	 $posts = Post::all();
	 require_once('views/posts/index.php');
 }
 public function show() {
	 // esperamos una url del tipo ?controller=posts&action=show&id=x
	 // si no nos pasan el id redirecionamos hacia la pagina de error, el id tenemos
	//que buscarlo en la BBDD
	 if (!isset($_GET['id'])) {
        return call('pages', 'error');
     }
	 // utilizamos el id para obtener el post correspondiente
	 $post = Post::find($_GET['id']);
	 require_once('views/posts/show.php');
 }
    
 public function formInsert(){ //Aquesta funcio només truca a l'arxiu del formulari post
	 require_once('views/posts/formInsert.php'); 
 }
 public function insert(){ //Aquesta funció realitza un insert amb els paràmetres del formulari i torna a la llista de posts
    $insert=Post::insert();
    call('posts', 'index');
     
 }
 public function delete(){ //funcio que esborra el post seleccionar a l'index
     $delete=Post::delete();
     call('posts', 'index');
 }
    
public function formUpdate(){ //Funcio que truca al formulari per actualitzar els posts
     if (!isset($_GET['id'])) { 
        return call('pages', 'error');
     }
	 // utilizamos el id para obtener el post correspondiente
	 $post = Post::find($_GET['id']);
	 require_once('views/posts/formUpdate.php');
 }
public function update(){ //Funcio que actualitza els parametres d'un post i torna a index.php
    $update=Post::update();
    call('posts', 'index');
}
}
?>
