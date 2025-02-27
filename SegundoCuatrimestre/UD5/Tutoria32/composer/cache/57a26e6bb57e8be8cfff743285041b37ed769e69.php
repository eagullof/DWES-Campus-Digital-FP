<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title><?php echo $__env->yieldContent('titulo'); ?></title>
</head>

<body>
    <div class="container mt-3">
        <h3 class="text-center"><?php echo $__env->yieldContent('encabezado'); ?></h3>
        <?php echo $__env->yieldContent('contenido'); ?>
    </div>
</body>

</html>