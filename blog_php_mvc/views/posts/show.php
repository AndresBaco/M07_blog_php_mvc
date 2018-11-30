<p><strong>Post #<?php echo $post->id; ?></strong></p>
<p><strong>Autor: </strong><?php echo $post->author; ?></p>
<p><strong>Post: </strong><?php echo $post->title; ?></p>
<p><strong>Contingut: </strong><?php echo $post->content; ?></p>
<p><strong>Data d'alta: </strong><?php echo $post->dataAlta; ?></p>
<p><strong>Ultima modificacio: </strong><?php echo $post->dataModificacio; ?></p>
<p><strong>Foto: </strong><?php echo $post->foto ? "<img src='uploads/{$post->foto}' style='width:300px;' />" : "No image found."; ?></p>

