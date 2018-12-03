<?php
class Category {
 // definimos 4 atributos
 public $categoria;
 public $dataAlta;
 public $publico;
 public $descripcio;
 public function __construct($categoria, $dataAlta, $publico, $descripcio) { //Canviem el constructor
	 $this->categoria = $categoria;
	 $this->dataAlta = $dataAlta;
	 $this->publico = $publico;
     $this->descripcio = $descripcio;
 }
    
    public static function all() { //Funcio reciclada de post.php per veure les categories
	 $list = [];
	 $db = Db::getInstance();
	 $req = $db->query('SELECT * FROM categories'); //Canviem la comanda
     
	 // creamos una lista de objectos post y recorremos la respuesta de la consulta
	 foreach($req->fetchAll() as $category) {
        //Creem un nou objecte Category 
		$list[] = new Category($category['categoria'], $category['dataAlta'],                                $category['publico'],$category['descripcio']);
	 }
	 return $list;
 }  
    
    public static function insert() { //Funcio per insertar una nova categoria
    //Aquesta funcio es gairebé igual que la de post.php , però treiem la part per insertar fotos
    $db = Db::getInstance();
     
    $categoria=$_POST['categoria']; //Declarem variables
    $dataAlta=$_POST['dataAlta'];
    $publico=$_POST['publico'];
    $descripcio=$_POST['descripcio'];
    
    $req = $db->prepare("INSERT into categories(categoria,dataAlta, publico, descripcio) VALUES (:categoria, :dataAlta ,:publico, :desccripcio)"); //Fem la comanda
    $req->bindParam(':categoria', $categoria);
    $req->bindParam(':dataAlta', $dataAlta);     
    $req->bindParam(':publico', $publico);
    $req->bindParam(':descripcio', $descripcio);    
    if($req->execute()){
        echo "S'ha creat la categoria amb èxit";
    }
}
 public static function find($categoria) {
	 $db = Db::getInstance();

	 $req = $db->prepare('SELECT * FROM categories WHERE categoria = :categoria');
	 // preparamos la sentencia y reemplazamos :categoria con el valor de $categoria
	 $req->execute(array('categoria' => $categoria));
	 $category = $req->fetch();
	 return new Category($category['categoria'], $category['dataAlta'], $category['publico'],$category['descripcio']);
 }   
    
 public static function update(){ //Funcio per actualitzar una categoria
    $db = Db::getInstance();
     
    $categoria=$_POST['categoria']; //Declarem variables
    $dataAlta=$_POST['dataAlta'];
    $publico=$_POST['publico'];
    $descripcio=$_POST['descripcio'];
    
    $req = $db->prepare("UPDATE categories set categoria=:categoria, dataAlta=:dataAlta, publico=:publico, descripcio=:descripcio
                         WHERE categoria= :categoria "); //Fem la comanda
    $req->bindParam(':categoria', $categoria);
    $req->bindParam(':dataAlta', $dataAlta);     
    $req->bindParam(':publico', $publico);
    $req->bindParam(':descripcio', $descripcio);    
    if($req->execute()){
        echo "S'ha modificat la categoria amb èxit";
    }
 }
 public static function delete() { //Funcio per esborrar una categoria
    $db = Db::getInstance();
    $categoria= $_GET['categoria']; //Nomes declarem la clau primaria
	// nos aseguramos que $id es un entero
	$req = $db->prepare('DELETE FROM posts WHERE id = :categoria'); //Fem la comanda
    $req->bindParam(':categoria', $categoria);
    if($req->execute()){ //La executem i tornem al index de categories
        echo "S'ha esborrat la categoria amb èxit";
    }
 }
}