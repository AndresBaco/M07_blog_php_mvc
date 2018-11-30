<?php
class Post {
 // definimos tres atributos
 // los declaramos como públicos para acceder directamente $post->author
 public $id;
 public $author;
 public $content;
 public function __construct($id, $author, $content, $title, $dataAlta, $dataModificacio, $foto) {
	 $this->id = $id;
	 $this->author = $author;
	 $this->content = $content;
     $this->title = $title;
     $this->dataAlta = $dataAlta;
     $this->dataModificacio = $dataModificacio;
     $this->foto = $foto;
 }
    

 public static function all() {
	 $list = [];
	 $db = Db::getInstance();
	 $req = $db->query('SELECT * FROM posts');

	 // creamos una lista de objectos post y recorremos la respuesta de la consulta
	 foreach($req->fetchAll() as $post) {
		$list[] = new Post($post['id'], $post['author'], $post['content'],$post['title'], $post['dataAlta'], $post['dataModificacio'], $post['foto']);
	 }
	 return $list;
 }
    

 public static function find($id) {
	 $db = Db::getInstance();
	 // nos aseguramos que $id es un entero
	 $id = intval($id);
	 $req = $db->prepare('SELECT * FROM posts WHERE id = :id');
	 // preparamos la sentencia y reemplazamos :id con el valor de $id
	 $req->execute(array('id' => $id));
	 $post = $req->fetch();
	 return new Post($post['id'], $post['author'], $post['content'],$post['title'], $post['dataAlta'], $post['dataModificacio'], $post['foto']);
 }
    
 public static function insert() {
    //$foto= $_FILES["foto"]["tmp_name"];
    //$nombrefoto  = $_FILES["foto"]["name"];
    //este es el archivo que añadiremosal campo blob
    //$foto  = $_FILES['foto']['tmp_name'];
    //lo comvertimos en binario antes de guardarlo
     
    //$foto=file_get_contents($_FILES["foto"]["tmp_name"]);
    //$foto= "'".$foto."'";
    $db = Db::getInstance();
     
    $author=$_POST['author'];
    $content=$_POST['content'];
    $title=$_POST['title'];
    $foto=htmlspecialchars(strip_tags($_FILES['foto']['tmp_name'])); 
     
    $foto=!empty($_FILES["foto"]["name"])
        ? sha1_file($_FILES['foto']['tmp_name']) . "-" . basename($_FILES["foto"]["name"]) : "";
    
    $req = $db->prepare("INSERT into posts(author,content, title, foto) VALUES (:author, :content,:title, :foto)");
    $req->bindParam(':author', $author);
    $req->bindParam(':content', $content);     
    $req->bindParam(':title', $title);
    $req->bindParam(':foto', $foto);    
    if($req->execute()){
        echo "<div class='alert alert-success'>S'ha creat el producte</div>";
        // try to upload the submitted file
        // uploadPhoto() method will return an error message, if any.
        //echo uploadPhoto();
        
        $result_message="";
 
        // now, if image is not empty, try to upload the image
        if($foto){

            // sha1_file() function is used to make a unique file name
            $target_directory = "uploads/";
            $target_file = $target_directory . $foto;
            $file_type = pathinfo($target_file, PATHINFO_EXTENSION);

            // error message is empty
            $file_upload_error_messages="";
            // make sure that file is a real image
            $check = getimagesize($_FILES["foto"]["tmp_name"]);
            if($check!==false){
            // submitted file is an image
            }else{
                $file_upload_error_messages.="<div>Submitted file is not an image.</div>";
            }

            // make sure certain file types are allowed
            $allowed_file_types=array("jpg", "jpeg", "png", "gif");
            if(!in_array($file_type, $allowed_file_types)){
                $file_upload_error_messages.="<div>Only JPG, JPEG, PNG, GIF files are allowed.</div>";
            }

            // make sure file does not exist
            if(file_exists($target_file)){
                $file_upload_error_messages.="<div>Image already exists. Try to change file name.</div>";
            }

            // make sure submitted file is not too large, can't be larger than 1 MB
            if($_FILES['foto']['size'] > (1024000)){
                $file_upload_error_messages.="<div>Image must be less than 1 MB in size.</div>";
            }

            // make sure the 'uploads' folder exists
            // if not, create it
            if(!is_dir($target_directory)){
                mkdir($target_directory, 0777, true);
            }
                    // if $file_upload_error_messages is still empty
            if(empty($file_upload_error_messages)){
                // it means there are no errors, so try to upload the file
                if(move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)){
                    // it means photo was uploaded
                }else{
                    $result_message.="<div class='alert alert-danger'>";
                        $result_message.="<div>Unable to upload photo.</div>";
                        $result_message.="<div>Update the record to upload photo.</div>";
                    $result_message.="</div>";
                }
            }

            // if $file_upload_error_messages is NOT empty
            else{
                // it means there are some errors, so show them to user
                $result_message.="<div class='alert alert-danger'>";
                    $result_message.="{$file_upload_error_messages}";
                    $result_message.="<div>Update the record to upload photo.</div>";
                $result_message.="</div>";
            }

                }

                echo $result_message;
    }
 
    // if unable to create the product, tell the user
    else{
        echo "<div class='alert alert-danger'>No s'ha pogut crear el producte</div>";
    }

 }
 public static function update(){
    //$foto= $_FILES["foto"]["tmp_name"];
    //$nombrefoto  = $_FILES["foto"]["name"];
    //este es el archivo que añadiremosal campo blob
    //$foto  = $_FILES['foto']['tmp_name'];
    //lo comvertimos en binario antes de guardarlo
    $author=$_POST['author'];
    $content=$_POST['content'];
    $title=$_POST['title'];
    $fecha = new DateTime();
    $fecha=$fecha->getTimestamp();
    $id=$_POST['id'];
    $foto=htmlspecialchars(strip_tags($_FILES['foto']['tmp_name'])); 
     
    $foto=!empty($_FILES["foto"]["name"])
        ? sha1_file($_FILES['foto']['tmp_name']) . "-" . basename($_FILES["foto"]["name"]) : "";
     
    $db = Db::getInstance();
    
    $req = $db->prepare("UPDATE posts set author=:author, content=:content, title=:title, dataModificacio=:data, foto=:foto 
                         WHERE id= :id ");
    $req->bindParam(':author', $author);
    $req->bindParam(':content', $content);     
    $req->bindParam(':title', $title);
    $req->bindParam(':data', $fecha);
    $req->bindParam(':foto', $foto); 
    $req->bindParam(':id', $id);
    if($req->execute()){
        echo "<div class='alert alert-success'>S'ha creat el producte</div>";
        // try to upload the submitted file
        // uploadPhoto() method will return an error message, if any.
        //echo uploadPhoto();
        
        $result_message="";
 
        // now, if image is not empty, try to upload the image
        if($foto){

            // sha1_file() function is used to make a unique file name
            $target_directory = "uploads/";
            $target_file = $target_directory . $foto;
            $file_type = pathinfo($target_file, PATHINFO_EXTENSION);

            // error message is empty
            $file_upload_error_messages="";
            // make sure that file is a real image
            $check = getimagesize($_FILES["foto"]["tmp_name"]);
            if($check!==false){
            // submitted file is an image
            }else{
                $file_upload_error_messages.="<div>Submitted file is not an image.</div>";
            }

            // make sure certain file types are allowed
            $allowed_file_types=array("jpg", "jpeg", "png", "gif");
            if(!in_array($file_type, $allowed_file_types)){
                $file_upload_error_messages.="<div>Only JPG, JPEG, PNG, GIF files are allowed.</div>";
            }

            // make sure file does not exist
            if(file_exists($target_file)){
                $file_upload_error_messages.="<div>Image already exists. Try to change file name.</div>";
            }

            // make sure submitted file is not too large, can't be larger than 1 MB
            if($_FILES['foto']['size'] > (1024000)){
                $file_upload_error_messages.="<div>Image must be less than 1 MB in size.</div>";
            }

            // make sure the 'uploads' folder exists
            // if not, create it
            if(!is_dir($target_directory)){
                mkdir($target_directory, 0777, true);
            }
                    // if $file_upload_error_messages is still empty
            if(empty($file_upload_error_messages)){
                // it means there are no errors, so try to upload the file
                if(move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)){
                    // it means photo was uploaded
                }else{
                    $result_message.="<div class='alert alert-danger'>";
                        $result_message.="<div>Unable to upload photo.</div>";
                        $result_message.="<div>Update the record to upload photo.</div>";
                    $result_message.="</div>";
                }
            }

            // if $file_upload_error_messages is NOT empty
            else{
                // it means there are some errors, so show them to user
                $result_message.="<div class='alert alert-danger'>";
                    $result_message.="{$file_upload_error_messages}";
                    $result_message.="<div>Update the record to upload photo.</div>";
                $result_message.="</div>";
            }

                }

                echo $result_message;
    }
 
    // if unable to create the product, tell the user
    else{
        echo "<div class='alert alert-danger'>No s'ha pogut crear el producte</div>";
    }
 }
 public static function delete() {
    $db = Db::getInstance();
    $id= $_GET['id'];
	// nos aseguramos que $id es un entero
	$req = $db->prepare('DELETE FROM posts WHERE id = :id');
    $req->bindParam(':id', $id);
    $req->execute();
 }
}

                         
?>
