<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title><?= $titulo ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"  rel="stylesheet">
    <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">

</head>
<body>
    
    <!-- Contenedor principal -->
    <div class="container">

        <h1 class="logo"><a href="<?= URL_PROTOCOL . URL_DOMAIN; ?>">Debut</a></h1>
        <?php $this->insert('partials/menu') ?>

        <?= $this->section('content') ?> 

     </div>

    <!-- jQuery -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <!-- Definir la URL del proyecto para las llamadas AJAX -->
    <script>
        var url = "<?php echo URL; ?>";
    </script>

    <!-- JavaScript -->
    <script src="<?php echo URL; ?>js/application.js"></script>
</body>
</html>

