<form method="post" action="?controller=posts&action=update" enctype="multipart/form-data">
    <h3> Post nº<?php echo $post->id; ?> </h3>
    
    <input type="hidden" id="id" name="id" value= "<?php echo $post->id; ?>">

    <label for="nom">Titol</label><br />
    <input type="text" id="title" name="title" value= "<?php echo $post->title; ?>"><br>
    
    <label for="nom">Autor</label><br />
    <input type="text" id="author" name="author" value= "<?php echo $post->author; ?>"><br>

    <label for="nom">Contingut:</label><br />
    <textarea name="content" rows="10" cols="30"><?php echo $post->content; ?> </textarea><br>

    <label for="nom">Foto:</label><br />
    <input name="foto" type="file" id="foto"><br /><br />
    
    <button type="submit" value="enviar">Enviar Dades</button>
</form>
