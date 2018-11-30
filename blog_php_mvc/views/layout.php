<DOCTYPE html>
    <html>

    <head>
    </head>

    <body>
        <header>
            <a href='/blog_php_mvc'>Home</a>
            <a href='?controller=posts&action=index'>Posts</a>
            <a href='?controller=posts&action=formInsert'>Insertar</a>

        </header>

        <?php require_once('routes.php'); ?>

        <footer>
            Andrés Baco Baltanal
        </footer>
    </body>

    </html>
