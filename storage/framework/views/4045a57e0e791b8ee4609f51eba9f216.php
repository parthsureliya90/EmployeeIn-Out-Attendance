<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['type' => '']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['type' => '']); ?>
<?php foreach (array_filter((['type' => '']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    $tableType =
        [
            'datatable' => 'datatable',
            'normal' => '',
            '' => '',
        ][$type] ?? '';
?>
<table class="table table-hover table-bordered table-striped  " id="<?php echo e($tableType); ?>">
    <thead>
        <tr>
            <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <th><?php echo e($colum); ?></th>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <th><?php echo e($colum); ?></th>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
    </tfoot>
    <tbody>

        <?php echo e($slot); ?>


    </tbody>
</table>
<?php /**PATH D:\xampp\htdocs\larning\emp\resources\views/components/table.blade.php ENDPATH**/ ?>