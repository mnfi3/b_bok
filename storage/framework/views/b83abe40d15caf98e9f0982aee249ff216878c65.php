<?php $__env->startSection('admin_content'); ?>
    <div class="container pb-5">
        <br>
        <div style="background-color: #721c24; width: 100%; height: 1px" class="mt-3"></div>
        <div class="row mt-4" >
            <h4 class="text-dark" style="font-family: Vazir; ">
                لیست کدهای تخفیف :
            </h4>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">ردیف</th>
                            <th scope="col">کد</th>
                            <th scope="col">درصد</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php ($i=0); ?>
                        <?php $__currentLoopData = $discounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th><?php echo e(++$i); ?></th>
                                <td><?php echo e($discount->code); ?> </td>
                                <td><?php echo e($discount->percent); ?></td>
                                <td><a href="<?php echo e(route('admin-discount-remove', $discount->id)); ?>" class="btn btn-sm btn-danger">حذف</a></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>



        <div class="col-xl-6">
            <h6>افزودن کد تخفیف</h6>
            <form class="mt-5" method="post" action="<?php echo e(route('admin-discount-add')); ?>" onsubmit="return confirm('آیا از افزودن کد تخفیف مطمئن هستید؟')">
                <?php echo csrf_field(); ?>
                <div class="form-group row">
                    <label for="oldPassword" class="col-sm-4 col-form-label">کد</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="oldPassword" name="code"
                               placeholder="مثال:norouz" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="oldPassword" class="col-sm-4 col-form-label">درصد تخفیف</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" id="oldPassword" name="percent"
                               placeholder="مثال:20" required>
                    </div>
                </div>


                <input type="submit" class="btn btn-info" value="ثبت">
            </form>

        </div>



    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>