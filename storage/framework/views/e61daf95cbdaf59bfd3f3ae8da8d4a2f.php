<?php if($errors->any()): ?>
    <div class="alert alert-danger alert-dismissible fade show" data-bs-dismiss="alert">
        <ul style="list-style:circle; text-transform: capitalize">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
<?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" data-bs-dismiss="alert">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<?php if(session('danger')): ?>
    <div class="aalert alert-danger alert-dismissible fade show" data-bs-dismiss="alert">
        <?php echo e(session('danger')); ?>

    </div>
<?php endif; ?>
<?php if(session('warning')): ?>
    <div class="alert alert-warning alert-dismissible fade show" data-bs-dismiss="alert">
        <?php echo e(session('warning')); ?>

    </div>
<?php endif; ?>
<?php if(session('info')): ?>
    <div class="alert alert-info alert-dismissible fade show" data-bs-dismiss="alert">
        <?php echo e(session('info')); ?>

    </div>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\larning\emp\resources\views/msg.blade.php ENDPATH**/ ?>