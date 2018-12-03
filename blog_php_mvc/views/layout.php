<DOCTYPE html>
    <html>

    <head>
    </head>

    <body>
        <header>
            <a href='/blog_php_mvc'>Home</a>
            <a href='?controller=posts&action=index'> Veure Posts</a>
            <a href='?controller=posts&action=formInsert'>Insertar Post</a>
            <a href='?controller=category&action=formInsert'>Insertar Categoria</a> <!--He afegit dos enllaços: un per insertar una categoria i un altre per veure-les -->
            <a href='?controller=category&action=index'>Veures categories</a>
            

        </header>

        <?php require_once('routes.php'); ?>

        <footer>
            Andrés Baco Baltanal
        </footer>
    </body>

    </html>
