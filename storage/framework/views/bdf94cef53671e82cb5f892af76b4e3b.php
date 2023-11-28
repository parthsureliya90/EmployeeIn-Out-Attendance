<?php $__env->startSection('content_auth'); ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Employees List
                        <span class=" text-end float-end">
                            <a href="<?php echo e(route('emp_create')); ?>" class="btn btn-sm btn-primary">Add New Employee</a>
                        </span>
                    </div>

                    <div class="card-body">
                        <?php echo $__env->make('msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="table-responsive">
                            <?php if (isset($component)) { $__componentOriginal7d9f6e0b9001f5841f72577781b2d17f = $component; } ?>
<?php $component = App\View\Components\Table::resolve(['columns' => ['No.', 'Name', 'Email', 'Phone', 'Post', 'Salary', 'Actions']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'datatable']); ?>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($data->firstItem() + $key); ?></td>
                                        <td><?php echo e($item->name); ?></td>
                                        <td><?php echo e($item->email); ?></td>
                                        <td><?php echo e($item->phonno); ?></td>
                                        <td><?php echo e($item->post); ?></td>

                                        <td><?php echo e(number_format($item->salary, 2)); ?></td>
                                        <td>

                                            <a href="<?php echo e(route('emp_edit', ['id' => $item->id])); ?>" target="_blank"
                                                class="btn btn-outline-primary btn-sm">Edit</a>
                                            <a href="<?php echo e(route('emp_destroy', ['id' => $item->id])); ?>"
                                                onclick="return confirm('Are you sure to remove this employee? All the data related to this Employee will be removed !')"
                                                class="btn btn-outline-danger btn-sm">Remove</a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7d9f6e0b9001f5841f72577781b2d17f)): ?>
<?php $component = $__componentOriginal7d9f6e0b9001f5841f72577781b2d17f; ?>
<?php unset($__componentOriginal7d9f6e0b9001f5841f72577781b2d17f); ?>
<?php endif; ?>

                            <div class="text-right float-right">
                                <?php if($data->lastPage() > 1): ?>
                                    <ul class="pagination">
                                        <li class="page-item   <?php echo e($data->currentPage() == 1 ? ' disabled' : ''); ?>">
                                            <a class="page-link" href="<?php echo e($data->url(1)); ?>">Previous</a>
                                        </li>
                                        <?php for($i = 1; $i <= $data->lastPage(); $i++): ?>
                                            <li
                                                class="page-item<?php echo e($data->currentPage() == $i ? ' active disabled' : ''); ?>">
                                                <a class="page-link" href="<?php echo e($data->url($i)); ?>"><?php echo e($i); ?></a>
                                            </li>
                                        <?php endfor; ?>
                                        <li
                                            class="page-item<?php echo e($data->currentPage() == $data->lastPage() ? ' disabled' : ''); ?>">
                                            <a class="page-link" href="<?php echo e($data->url($data->currentPage() + 1)); ?>">Next</a>
                                        </li>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\larning\emp\resources\views/emp_list.blade.php ENDPATH**/ ?>