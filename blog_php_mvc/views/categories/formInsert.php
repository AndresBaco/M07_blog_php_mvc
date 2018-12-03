<form method="post" action="?controller=category&action=insert" > <!--Formulari per insertar una nova categoria -->
    <label for="categoria">Categoria:</label><br />
    <input type="text" id="categoria" name="categoria"><br>

    <label for="nom">Data d'alta:</label><br />
    <input type="date" id="dataAlta" name="dataAlta"><br>

    <label for="publico">public:</label><br />
		<select name="publico">    
			<option value="tots" selected="tots">Tots</option>
			<option value="adults">Adults</option>
			<option value="infantil">Infantil</option>
		</select><br><br>
    
   
    <label for="descripcio">Descripcio:</label><br />
    <textarea name="descripcio" rows="10" cols="30" ></textarea><br>

    <button type="submit" value="enviar">Enviar Dades</button>
</form>
