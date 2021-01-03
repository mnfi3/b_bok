<?php $__env->startSection('content'); ?>
    <section id="detail" class="w-100 bg-texture">
        <div class="container p-3">
            <div class="shadow-box p-3">
                <div class="row">
                    <div class="col-md-4 img-container">
                        <img src="<?php echo e(asset($book->image_path)); ?>" alt="">
                    </div>
                    <div class="col-md-8 mt-2 mt-md-0">
                        <h4><?php echo e($book->name); ?></h4>

                        <?php if($book->discount_percent > 0): ?>
                        <h5 class="mt-4" >
                            <span class="text-danger" style="text-decoration: line-through"><?php echo e(number_format($book->price)); ?> تومان</span>
                        </h5>

                        <h5 class="mt-4">
                            <span class="text-success"><?php echo e(number_format( (int)($book->price - ($book->price * $book->discount_percent/100)))); ?> تومان</span>
                        </h5>
                        <?php else: ?>
                            <h5 class="mt-4" >
                                <span ><?php echo e(number_format($book->price)); ?></span>
                                <span class=" ml-2">تومان</span>
                            </h5>
                        <?php endif; ?>


                        <?php if(auth()->user() !== null): ?>
                            <?php if(auth()->user()->role !== 'admin'): ?>

                                <?php if($book->stock > 0): ?>
                                    <a href="<?php echo e(route('user-cart-add', $book->id)); ?>">
                                        <button type="submit" class="btn btn-success mt-4 "> افزودن به سبد خرید
                                            <i class="fa fa-shopping-cart"></i>
                                        </button>
                                    </a>
                                <?php endif; ?>
                                <a href="<?php echo e(route('user-cart')); ?>" class="btn btn-outline-info mt-4 ">مشاهده سبد خرید</a>

                            <?php endif; ?>
                        <?php else: ?>

                            <?php if($book->stock > 0): ?>
                                <a href="<?php echo e(route('user-cart-add', $book->id)); ?>">
                                    <button type="submit" class="btn btn-success mt-4 "> افزودن به سبد خرید
                                        <i class="fa fa-shopping-cart"></i>
                                    </button>
                                </a>
                            <?php endif; ?>
                            <a href="<?php echo e(route('user-cart')); ?>" class="btn btn-outline-info mt-4 ">مشاهده سبد خرید</a>

                        <?php endif; ?>
                        <?php if($book->stock < 1): ?>
                            <div class="mt-4">
                                <span class="alert alert-danger p-1 text-center alert-unavailable ">نا موجود!</span>
                            </div>
                        <?php endif; ?>



                        <div class="mt-5">
                            <h5>توضیحات</h5>
                            <h6 class="mt-3">نویسنده: <strong><?php echo e($book->author); ?></strong></h6>
                            <?php if(strlen($book->translator) > 2): ?>
                            <h6 class="mt-3">مترجم: <strong><?php echo e($book->translator); ?></strong></h6>
                            <?php endif; ?>
                            <h6 class="mt-2">ناشر: <strong><?php echo e($book->publisher); ?></strong></h6>
                            <h6 class="mt-2">تاریخ و نوبت نشر: <strong><?php echo e($book->publication_date); ?></strong></h6>
                            <h6 class="mt-2">تعداد صفحات: <strong><?php echo e($book->page_count); ?></strong></h6>
                            <h6 class="mt-3">شرح کتاب:</h6>
                            <p class="mt-1">
                                <?php echo e($book->description); ?>


                            </p>

                            <?php if($book->demo_file !== null): ?>
                                <button type="button" class="btn btn-primary ">
                                    <a class="text-white" style="text-decoration: none" href="<?php echo e(Illuminate\Support\Facades\URL::to('/') .'/'.$book->demo_file); ?>" target="_blank">دانلود صفحات اول </a>
                                </button>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <?php if($message): ?>
            <span class="server-response sr-success active"><?php echo e($message); ?></span>
        <?php endif; ?>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>