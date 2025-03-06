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
            <?php $__currentLoopData = $familias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $familia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="text-center">
                    <th><?php echo e($familia->cod); ?></th>
                    <td><?php echo e($familia->nombre); ?></td>
                    <td><?php echo $barcodes[$familia->cod]; ?></td>
                    <td><img src="data:image/png;base64,<?php echo e($qrCodes[$familia->cod]); ?>" alt="Código qr"></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('enlace'); ?>
    productos.php
<?php $__env->stopSection(); ?>

<?php $__env->startSection('textoEnlace'); ?>
    Ver Productos
<?php $__env->stopSection(); ?>

<?php echo $__env->make('plantillas.plantilla1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>