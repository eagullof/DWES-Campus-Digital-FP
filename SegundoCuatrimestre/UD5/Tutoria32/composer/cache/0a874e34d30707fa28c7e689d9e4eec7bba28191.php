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
                <th>Nombre Corto</th>
                <th>Precio</th>
                <th>Código de barras</th> <!-- Columna para mostrar el código de barras -->
                <th>Código qr</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="text-center">
                    <th><?php echo e($item->id); ?></th>
                    <td><?php echo e($item->nombre); ?></td>
                    <td><?php echo e($item->nombre_corto); ?></td>
                    <td class="<?php echo e($item->pvp > 100 ? 'text-danger' : 'text-success'); ?>"><?php echo e($item->pvp); ?></td>
                    <!-- Mostrar el código de barras como imagen -->
                    <td>
                        <img src="data:image/png;base64,<?php echo e($item->codigo_barras); ?>" alt="Código de barras">
                    </td>
                    <td>
                        <img src="data:image/png;base64,<?php echo e($item->qrCode); ?>" alt="Código de barras">
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <!-- Enlace para navegar a la vistaFamilias -->
    <div class="text-center">
        <a href="familias.php" class="btn btn-primary">Ver Familias</a> <!-- Cambia la URL a la correcta si es necesario -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('plantillas.plantilla1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>