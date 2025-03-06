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
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="text-center">
                    <th><?php echo e($producto->id); ?></th>
                    <td><?php echo e($producto->nombre); ?></td>
                    <td><?php echo e($producto->nombre_corto); ?></td>
                    <td class="<?php echo e($producto->pvp > 100 ? 'text-danger' : 'text-success'); ?>">
                        <?php echo e($producto->pvp); ?>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <div class="text-center mt-3">
        <a href="exportarProductos.php" class="btn btn-success">Exportar a Excel</a>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('enlace'); ?>
    familias.php
<?php $__env->stopSection(); ?>

<?php $__env->startSection('textoEnlace'); ?>
    Ver Familias
<?php $__env->stopSection(); ?>

<?php echo $__env->make('plantillas.plantilla1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>