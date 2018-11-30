
<p><strong>Listado de los posts:</strong></p>
<table class="tabla" style='width:100%'> <!-- La taula del menú comença aquí -->
			<tr class="title">
				<th> ID </th>
                <th> Títol </th>
                <th> Autor </th>
			</tr>
            
<?php foreach($posts as $post) { ?>
<tr> 
    <td><?php echo $post->id; ?></td>
    <td><?php echo $post->title; ?></td>
    <td> <?php echo $post->author; ?></td>
    <td><a href='?controller=posts&action=show&id=<?php echo $post->id; ?>'>Ver
        contenido</a></td>
    <td><a href='?controller=posts&action=delete&id=<?php echo $post->id; ?>'>Eliminar</a></td>
    <td><a href='?controller=posts&action=formUpdate&id=<?php echo $post->id; ?>'>Modificar</a></td>
</tr>
<?php } ?>
