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
    
 public function formInsert(){
	 require_once('views/posts/formInsert.php');
 }
 public function insert(){
    $insert=Post::insert();
    call('posts', 'index');
     
 }
 public function delete(){
     $delete=Post::delete();
     call('posts', 'index');
 }
    
public function formUpdate(){
     if (!isset($_GET['id'])) {
        return call('pages', 'error');
     }
	 // utilizamos el id para obtener el post correspondiente
	 $post = Post::find($_GET['id']);
	 require_once('views/posts/formUpdate.php');
 }
public function update(){
    $update=Post::update();
    call('posts', 'index');
}
}
?>
