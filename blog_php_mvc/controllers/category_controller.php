<?php
class CategoryController { //He creat una classe completament nova amb les funcions reciclades del posts_controller per poder utilitzar la segona taula
 public function index() {
	 // Guardem les categories en una variable
	 $categories = Category::all();
	 require_once('views/categories/index.php');
 }
 public function show() { //Funcio per veure una categoria
	 //mirem que la categoria és correcta
	 if (!isset($_GET['categoria'])) {
        return call('pages', 'error');
     }
	 // Si la categoria existeix, la busca a la BBDD
	 $category = Category::find($_GET['categoria']);
     //Anem a l'arxiu show.php
	 require_once('views/categories/show.php');
 }
 public function formInsert(){//Funcio que només truca al formulari per insertar categories
	 require_once('views/categories/formInsert.php');
 }
 public function insert(){ //funcio per insertar
    $insert=Category::insert();
    call('category', 'index');
     
 }
 public function delete(){
     $delete=Category::delete();
     call('category', 'index');
 }
    
public function formUpdate(){
     if (!isset($_GET['categoria'])) {
        return call('pages', 'error');
     }
	 // utilizamos el id para obtener el post correspondiente
	 $category = Category::find($_GET['categoria']);
	 require_once('views/categories/formUpdate.php');
 }
public function update(){
    $update=Category::update();
    call('category', 'index');
}
}
?>