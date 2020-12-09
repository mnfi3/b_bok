<?php $__env->startSection('user_content'); ?>
    <div class="container p-1 ">
        <h6>لیست سفارشات شما</h6>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ردیف</th>
                    <th scope="col" >لیست محصولات</th>
                    <th scope="col">تعداد</th>
                    <th scope="col">قیمت مجموع</th>
                    <th scope="col">وضعیت</th>

                </tr>
                </thead>
                <tbody>

                <?php ($i=0); ?>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row"><?php echo e(++$i); ?></th>
                        <td class="d-flex flex-column">
                            <?php $__currentLoopData = $order->content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="or-link" href="<?php echo e(route('detail', $content->book->id)); ?>"><?php echo e($content->book->name); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>

                        <td class="">
                            <div class="d-flex flex-column">
                                <?php $__currentLoopData = $order->content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="p-or"><?php echo e($content->count); ?> </span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </td>

                        <td class="">
                            <div class="d-flex flex-column">
                                <?php $__currentLoopData = $order->content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="p-or"><?php echo e(number_format($content->price)); ?> تومان</span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </td>

                        <?php if($order->is_in_person == 1): ?>

                            <?php if($order->is_sent == 0): ?>
                                <td>
                                    <div><i class="fa fa-hourglass text-info mr-1"></i>آماده تحویل</div>
                                    <div><span>کد خرید: <?php echo e($order->buy_code); ?></span></div>
                                    <div><span>با ارائه کد خرید به کتابخانه مرکزی اقدام به دریافت کتاب/کتابهای خود نمایید.</span></div>
                                </td>
                            <?php else: ?>
                                <td>
                                    <div><i class="fa fa-check mr-1 text-success"></i>تحویل داده شده</div>
                                    <div><span>کد خرید: <?php echo e($order->buy_code); ?></span></div>
                                    <div><span>کتاب/کتابهای شما قبلا به صورت حضوری تحویل داده شده اند.</span></div>
                                </td>
                            <?php endif; ?>


                        <?php else: ?>

                            <?php if($order->is_sent == 0): ?>
                                <td>
                                    <div><i class="fa fa-hourglass text-info mr-1 "></i>درحال ارسال...</div>
                                </td>
                            <?php else: ?>
                                <td>
                                    <div><i class="fa fa-check mr-1 text-success"></i>ارسال شده</div>
                                    <div><span>کد رهگیری پستی : <?php echo e($order->trace_no); ?></span></div>
                                    <div><a href="http://newtracking.post.ir" target="_blank">برای مشاهده وضعیت مرسوله اینجا کلیک کنید</a></div>
                                </td>
                            <?php endif; ?>

                        <?php endif; ?>

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>