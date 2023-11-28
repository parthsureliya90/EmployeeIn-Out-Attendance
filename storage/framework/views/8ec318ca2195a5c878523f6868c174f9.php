<?php $__env->startSection('content_auth'); ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">


                    <div class="card-body">
                        <?php echo $__env->make('msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



                        <div class="text-center">
                            <div class="btn-group" role="group" aria-label="Default button group">
                                
                                <a href="<?php echo e(route('attendance', ['status' => 'NotEntered'])); ?>"
                                    class="btn btn-outline-primary <?php echo e($status == 'NotEntered' ? 'active' : ''); ?>">Not
                                    Entered</a>
                                <a href="<?php echo e(route('attendance', ['status' => 'Working'])); ?>"
                                    class="btn btn-outline-primary <?php echo e($status == 'Working' ? 'active' : ''); ?>">Working</a>
                                <a href="<?php echo e(route('attendance', ['status' => 'Exited'])); ?>"
                                    class="btn btn-outline-primary <?php echo e($status == 'Exited' ? 'active' : ''); ?>">Exited</a>
                            </div>
                        </div>
                        <br>
                        <div class="alert alert-info">
                            <strong>Showing data for date : <?php echo e(date('d-m-Y')); ?></strong>
                        </div>
                        <div class="table-responsive">
                            <?php if (isset($component)) { $__componentOriginal7d9f6e0b9001f5841f72577781b2d17f = $component; } ?>
<?php $component = App\View\Components\Table::resolve(['columns' => [
                                'No.',
                                'Name',
                                'Email',
                                'Phone',
                                'Post',
                                'In',
                                'Out',
                                'Salary',
                                'Working Hours',
                                'Earnings',
                                'Bonus Hours',
                                'Bonus Pay',
                            ]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Table::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'datatable']); ?>

                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($key + 1); ?></td>
                                        <td><?php echo e($item->name); ?></td>
                                        <td><?php echo e($item->email); ?></td>
                                        <td><?php echo e($item->phonno); ?></td>
                                        <td><?php echo e($item->post); ?></td>
                                        <td><?php echo e(date('h:i:s A', strtotime($item->entry_time))); ?></td>
                                        <td><?php echo e(date('h:i:s A', strtotime($item->exit_time))); ?></td>
                                        <td>&#x20B9; <?php echo e(number_format($item->salary, 2)); ?></td>
                                        <td> <?php echo e($item->total_woking_hours); ?></td>
                                        <td> <?php echo e(number_format($item->dailyPay, 2)); ?> (
                                            <?php echo e($item->total_woking_hours . ' hours x ' . number_format($item->hourly_pay, 2)); ?>

                                            )</td>
                                        <td> <?php echo e($item->bounus_woking_hours); ?></td>
                                        <td>&#x20B9; <?php echo e(number_format($item->bonus_pay, 2)); ?></td>
                                        <td>

                                            <?php if($status == 'NotEntered'): ?>
                                                <a href="<?php echo e(route('attendance_log_store', ['id' => $item->id, 'status' => 'IN'])); ?>"
                                                    class="btn btn-success btn-sm">IN</a>
                                            <?php endif; ?>

                                            <?php if($status == 'Working'): ?>
                                                <a href="<?php echo e(route('attendance_log_store', ['id' => $item->id, 'status' => 'OUT'])); ?>"
                                                    class="btn btn-danger btn-sm">OUT</a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7d9f6e0b9001f5841f72577781b2d17f)): ?>
<?php $component = $__componentOriginal7d9f6e0b9001f5841f72577781b2d17f; ?>
<?php unset($__componentOriginal7d9f6e0b9001f5841f72577781b2d17f); ?>
<?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\larning\emp\resources\views/attendances.blade.php ENDPATH**/ ?>