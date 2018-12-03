<p><strong>Listat de categories:</strong></p> 
<table class="tabla" style='width:100%'> <!-- La taula del menú comença aquí -->
			<tr class="title">
				<th> Categoria </th>
                <th> Data d'alta </th>
			</tr>
            
<?php foreach($categories as $category) { ?>
<tr> 
    <td><?php echo $category->categoria; ?></td>
    <td><?php echo $category->dataAlta; ?></td>
    <td><a href='?controller=category&action=show&categoria=<?php echo $category->categoria; ?>'>Ver
        contenido</a></td>
    <td><a href='?controller=category&action=delete&categoria=<?php echo $category->categoria; ?>'>Eliminar</a></td>
    <td><a href='?controller=category&action=formUpdate&categoria=<?php echo $category->categoria; ?>'>Modificar</a></td>
</tr>
<?php } ?>