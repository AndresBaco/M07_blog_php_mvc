<form method="post" action="?controller=posts&action=insert" enctype="multipart/form-data"> <!--Funcio per crear un nou post -->
    <label for="title">Títol:</label><br />
    <input type="text" id="title" name="title"><br>

    <label for="nom">Autor:</label><br />
    <input type="text" id="author" name="author"><br>

    <label for="nom">Contingut:</label><br />
    <textarea name="content" rows="10" cols="30" ></textarea><br>
    
    <label for="nom">Categoria:</label><br />
    <input type="text" id="categoria" name="categoria"><br>
    
    <label for="nom">Foto:</label><br />
    <input name="foto" type="file" id="foto"><br /><br />

    <button type="submit" value="enviar">Enviar Dades</button>
</form>
