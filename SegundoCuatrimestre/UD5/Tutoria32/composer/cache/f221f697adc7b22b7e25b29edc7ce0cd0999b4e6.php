<?php $__env->startSection('titulo'); ?>
    <?php echo e($titulo); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('encabezado'); ?>
    <?php echo e($encabezado); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
    <table class="table table-striped">
        <thead>
            <tr class="text-center">
                <th>Código</th>
                <th>Nombre</th>
                <th>Código de barras</th>
                <th>Código QR</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $familias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="text-center">
                    <th><?php echo e($item->cod); ?></th>
                    <td><?php echo e($item->nombre); ?></td>
                    <td><img src="data:image/png;base64,<?php echo e($item->codigo_barras); ?>" alt="Código de barras"></td>
                    <td><img src="data:image/png;base64,<?php echo e($item->qrCode); ?>" alt="Códio QR"></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <!-- Enlace para navegar a la vistaFamilias -->
    <div class="text-center">
        <a href="productos.php" class="btn btn-primary">Ver Productos</a> <!-- Cambia la URL a la correcta si es necesario -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('plantillas.plantilla1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>