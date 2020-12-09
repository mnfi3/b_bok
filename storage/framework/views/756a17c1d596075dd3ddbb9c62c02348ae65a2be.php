<?php $__env->startSection('admin_content'); ?>

    <!--MESSAGE MODAL-->
    <?php $__currentLoopData = $old_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="modal rtl" id="Modal<?php echo e($order->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title ml-auto" id="exampleModalLabel">جزئیات سفارش</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                        <h6 class="modal-title ml-auto text-center" id="exampleModalLabel">اطلاعات پرداخت </h6><br>
                    <div class="row">
                        <div class="col-md-5">
                            <p class="text-dark" style="font-family: Vazir; font-size: 0.9rem">
                                شماره مرجع تراکنش :
                            </p>
                        </div>
                        <div class="col-md-7">
                            <p class="text-dark" style="font-family: Vazir; font-size: 1.1rem">
                               <?php echo e($order->payment->retrival_ref_no); ?>

                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <p class="text-dark" style="font-family: Vazir; font-size: 0.9rem">
                                شماره پیگیری :
                            </p>
                        </div>
                        <div class="col-md-7">
                            <p class="text-dark" style="font-family: Vazir; font-size: 1.1rem">
                                <?php echo e($order->payment->system_trace_no); ?>

                            </p>
                        </div>
                    </div>
                    <hr>

                    <h6 class="modal-title ml-auto text-center" id="exampleModalLabel">اطلاعات تحویل </h6><br>
                    <div class="row">
                        <div class="col-md-5">
                            <p class="text-dark" style="font-family: Vazir; font-size: 0.9rem">
                                نوع تحویل :
                            </p>
                        </div>
                        <div class="col-md-7">
                            <?php if($order->is_in_person == 1): ?>
                            <p class="text-dark" style="font-family: Vazir; font-size: 1.1rem">
                                حضوری
                            </p>
                            <?php else: ?>
                                <p class="text-dark" style="font-family: Vazir; font-size: 1.1rem">
                                    پستی
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <p class="text-dark" style="font-family: Vazir; font-size: 0.9rem">
                                کد رهگیری/خرید :
                            </p>
                        </div>
                        <div class="col-md-7">
                            <?php if($order->is_in_person == 1): ?>
                                <p class="text-dark" style="font-family: Vazir; font-size: 1.1rem">
                                    کد خرید:<?php echo e($order->buy_code); ?>

                                </p>
                            <?php else: ?>
                                <p class="text-dark" style="font-family: Vazir; font-size: 1.1rem">
                                    شماره نامه:<?php echo e($order->letter_number); ?> <br>
                                    کد رهگیری پستی:<?php echo e($order->trace_no); ?>

                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-md-5">
                            <p class="text-dark" style="font-family: Vazir; font-size: 0.9rem">
                                زمان ثبت سفارش
                            </p>
                        </div>
                        <div class="col-md-7">
                            <?php ($date = new \App\Http\Controllers\Util\Pdate()); ?>
                            <?php ($d = explode(' ', $order->created_at)[0]); ?>
                            <?php ($time = explode(' ', $order->created_at)[1]); ?>
                            <p class="text-black" > <?php echo e($time); ?>  ---  <?php echo e($date->toPersian($d, 'Y/m/d')); ?>  </p>
                        </div>
                    </div>

                    <?php if($order->sended_at != null): ?>
                    <div class="row">
                        <div class="col-md-5">
                            <p class="text-dark" style="font-family: Vazir; font-size: 0.9rem">
                                 زمان ارسال سفارش
                            </p>
                        </div>
                        <div class="col-md-7">
                            <?php ($date = new \App\Http\Controllers\Util\Pdate()); ?>
                            <?php ($d = explode(' ', $order->sended_at)[0]); ?>
                            <?php ($time = explode(' ', $order->sended_at)[1]); ?>
                            <p class="text-black" > <?php echo e($time); ?>  ---  <?php echo e($date->toPersian($d, 'Y/m/d')); ?>  </p>
                        </div>
                    </div>
                    <?php else: ?>
                        <div class="row">
                            <div class="col-md-5">
                                <p class="text-dark" style="font-family: Vazir; font-size: 0.9rem">
                                    زمان ارسال سفارش
                                </p>
                            </div>
                            <div class="col-md-7">
                                <?php ($date = new \App\Http\Controllers\Util\Pdate()); ?>
                                <?php ($d = explode(' ', $order->updated_at)[0]); ?>
                                <?php ($time = explode(' ', $order->updated_at)[1]); ?>
                                <p class="text-black" > <?php echo e($time); ?>  ---  <?php echo e($date->toPersian($d, 'Y/m/d')); ?>  </p>
                            </div>
                        </div>
                    <?php endif; ?>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">بستن</button>

                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





    <div class="container-fluid p-1 p-sm-2">
        <h6 class="alert alert-warning"><i class="fa fa-hourglass mr-1"></i>لیست سفارشات ارسال نشده</h6>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ردیف</th>
                    <th scope="col">لیست محصولات</th>
                    <th scope="col">تعداد</th>
                    <th scope="col">قیمت کل</th>
                    <th scope="col">اطلاعات کاربر</th>
                    <th scope="col" style="width: 310px">آدرس</th>
                    <th scope="col" style="width: 310px">زمان ثبت سفارش</th>
                    <th scope="col" style="width: 140px">وضعیت</th>

                </tr>
                </thead>
                <tbody>

                <?php ($i=0); ?>
                <?php $__currentLoopData = $new_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row"><?php echo e(++$i); ?></th>

                        <td class="d-flex flex-column">
                            <?php $__currentLoopData = $order->content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($content->book !== null): ?>
                                    <a class="or-link" href="<?php echo e(route('detail', $content->book->id)); ?>"><?php echo e($content->book->name); ?></a>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td >
                            <div class="d-flex flex-column">
                                <?php $__currentLoopData = $order->content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="p-or"><?php echo e($content->count); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </td>
                        <td class="">
                            <div class="d-flex flex-column">
                                <?php $__currentLoopData = $order->content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="p-or">  <?php echo e(number_format($content->price)); ?> تومان </span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </td>
                        <td>
                            <div> <?php echo e($order->user->name); ?></div>
                            <div> <?php echo e($order->phone); ?></div>
                            
                        </td>

                        <td >
                            <?php if($order->is_in_person != 1): ?>
                                <?php echo e($order->address); ?><br><?php echo e('کدپستی : '.$order->postal_code); ?>

                            <?php else: ?>
                                <?php echo e($order->address); ?>

                            <?php endif; ?>
                        </td>


                        <?php ($date = new \App\Http\Controllers\Util\Pdate()); ?>
                        <?php ($d = explode(' ', $order->created_at)[0]); ?>
                        <?php ($time = explode(' ', $order->created_at)[1]); ?>
                        <td class="text-black" > <?php echo e($date->toPersian($d, 'Y/m/d')); ?> <br> <?php echo e($time); ?>  </td>



                        <td>
                            <form action="<?php echo e(route('admin-send-order')); ?>" class="text-center" method="post">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="order_id" value="<?php echo e($order->id); ?>">
                                <?php if($order->is_in_person != 1): ?>
                                    <input type="text" name="letter_number" class="form-control" placeholder="شماره نامه" style="font-size: 0.85em" >
                                    <input type="text" name="trace_no" class="form-control" placeholder="کد رهگیری پستی" style="font-size: 0.85em" >
                                    <input type="submit" class="btn btn-sm btn-info mt-2" value="ارسال شد">
                                <?php else: ?>
                                    <span>کد خرید</span>
                                    <input type="text" name="trace_no" class="form-control " disabled placeholder="کد خرید حضوری" value="<?php echo e($order->buy_code); ?>" style="font-size: 0.85em" >
                                    <input type="submit" class="btn btn-sm btn-info mt-2" value="تحویل داده شد">
                                <?php endif; ?>
                            </form>
                        </td>

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





                </tbody>
            </table>
        </div>
        <br>
        <hr>
        <br>

        <h6 class="alert alert-success mt-5"><i class="fa fa-check mr-1"></i>لیست سفارشات ارسال شده</h6>




        <form action="<?php echo e(route('admin-orders-search')); ?>" method="post" class="mt-5 mb-5">
            <?php echo csrf_field(); ?>
            <div class="form-group row">
                <label for="address" class="col-sm-2 col-form-label">متن جستجو</label>
                <div class="col-sm-8">
                    <input  name="text" type="text" class="form-control" rows="5"
                           <?php if(!empty($search)): ?>
                                   value="<?php echo e($search); ?>"
                           <?php endif; ?>
                           placeholder="نام یا ایمیل یا شماره موبایل کاربر را وارد کنید" >
                </div>
            </div>
            <div class="form-group row">
                <button type="submit" class="btn btn-success mt-2 ml-2 col-sm-2">جستجو</button>
                <div class="col-sm-8">

                </div>
            </div>
        </form>




        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ردیف</th>
                    <th scope="col">لیست محصولات</th>
                    <th scope="col">تعداد</th>
                    <th scope="col">قیمت کل</th>
                    <th scope="col">اطلاعات کاربر</th>
                    <th scope="col" style="width: 310px" >آدرس</th>
                    <th scope="col" style="width: 140px">جزئیات</th>

                </tr>
                </thead>
                <tbody>

                <?php ($i=0); ?>
                <?php $__currentLoopData = $old_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row"><?php echo e(++$i); ?></th>

                        <td class="d-flex flex-column">
                            <?php $__currentLoopData = $order->content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($content->book !== null): ?>
                                    <a class="or-link" href="<?php echo e(route('detail', $content->book->id)); ?>"><?php echo e($content->book->name); ?></a>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td >
                            <div class="d-flex flex-column">
                                <?php $__currentLoopData = $order->content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="p-or"><?php echo e($content->count); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </td>
                        <td class="">
                            <div class="d-flex flex-column">
                                <?php $__currentLoopData = $order->content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="p-or">  <?php echo e(number_format($content->price)); ?> تومان </span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </td>
                        <td>
                            <div> <?php echo e($order->user->name); ?></div>
                            <div> <?php echo e($order->phone); ?></div>
                            
                        </td>

                        <td >
                            <?php if($order->is_in_person != 1): ?>
                                <?php echo e($order->address); ?><br><?php echo e('کدپستی : '.$order->postal_code); ?>

                            <?php else: ?>
                                <?php echo e($order->address); ?>

                            <?php endif; ?>
                        </td>


                        <td>
                            <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#Modal<?php echo e($order->id); ?>"> مشاهده </a>
                        </td>

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





                </tbody>



            </table>
            <?php if($old_orders->links() != null): ?>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php echo e($old_orders->links()); ?>

                </ul>
            </nav>
            <?php endif; ?>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>