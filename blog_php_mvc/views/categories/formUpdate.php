<form method="post" action="?controller=category&action=update"> <!-- Formulari per actualitzar una categoria -->
    
    <input type="hidden" id="id" name="id" value= "<?php echo $category->categoria; ?>">

    <label for="nom">Categoria</label><br />
    <input type="text" id="categoria" name="categoria" value= "<?php echo $category->categoria; ?>"><br>
    
    <label for="nom">Data d'Alta</label><br />
    <input type="date" id="dataAlta" name="dataAlta" value= "<?php echo $category->dataAlta; ?>"><br>

    <label for="nom">Públic:</label><br />
        <select name="publico">    
			<option value="tots" selected="<?php echo $category->publico; ?>">Tots</option>
			<option value="adults">Adults</option>
			<option value="infantil">Infantil</option>
		</select><br><br>

    <label for="nom">Descripcio:</label><br />
    <textarea name="descripcio" rows="10" cols="30"><?php echo $category->descripcio; ?> </textarea><br>
    
    <button type="submit" value="enviar">Enviar Dades</button>
</form>
