<?php $__env->startSection('admin_content'); ?>
    <div class="container pb-5">
       <div class="row ">
           <div class="col-md-12 ">
               <h4 class="text-dark" style="font-family: Vazir; ">
                   پشتیبان گیری از سیستم :
               </h4>
               <br>
               <a href="<?php echo e(route('admin-backup')); ?>" class="btn btn-danger"> دریافت فایل پشتیبان </a>
                   <span class="text-dark mr-2" style="font-family: Vazir; font-size: 1.0rem">
                                (توجه : ممکن است لحظاتی طول بکشد!)
                   </span>
           </div>

       </div>
        <br>
        <div style="width: 100%;height: 2px;background-color: #1b9abd;margin-top: 10px" class=""></div>
        <form action="" class="" method="post" enctype="multipart/form-data" style="width: 100%!important;">
            <?php echo csrf_field(); ?>
        <div class="row mt-4">
            <div class="col-md-4">
                <h5 class="mt-2">آدرس :</h5>
                    <div class="form-group row">
                        <div class="col-sm-11">
                            <textarea type="text" style="width: 290px;height: 190px" class="form-control" id="postTitle"
                                      name="name"
                                      placeholder="آدرس را وارد کنید" value="" required></textarea>
                        </div>
                    </div>

            </div>
            <div class="col-md-4">
                <h5 class="mt-2">اطلاعات کارشناس :</h5>


                    <div class="form-group row">
                        <div class="col-sm-11">
                            <input type="text" style="" class="form-control" id="postTitle"
                                   name="name"
                                   placeholder="نام کارشناس" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-11">
                            <input type="text" style="" class="form-control" id="postTitle"
                                   name="name"
                                   placeholder="شماره تماس مستقیم" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-11">
                            <input type="text" style="" class="form-control" id="postTitle"
                                   name="name"
                                   placeholder="شماره تماس داخلی" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-11">
                            <input type="text" style="" class="form-control" id="postTitle"
                                   name="name"
                                   placeholder="ایمیل" value="" required>
                        </div>
                    </div>



            </div>
            <div class="col-md-4">
                <h5 class="mt-2">اطلاعات دبیر انتشارات :</h5>

                    <?php echo csrf_field(); ?>
                    <div class="form-group row">
                        <div class="col-sm-11">
                            <input type="text" style="" class="form-control" id="postTitle"
                                   name="name"
                                   placeholder="نام کارشناس" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-11">
                            <input type="text" style="" class="form-control" id="postTitle"
                                   name="name"
                                   placeholder="شماره تماس مستقیم" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-11">
                            <input type="text" style="" class="form-control" id="postTitle"
                                   name="name"
                                   placeholder="شماره تماس داخلی" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-11">
                            <input type="text" style="" class="form-control" id="postTitle"
                                   name="name"
                                   placeholder="ایمیل" value="" required>
                        </div>
                    </div>



            </div>
            <div class="col-md-4">
                <h5 class="mt-2"> لینک های مفید :</h5>

                    <div class="form-group row">
                        <div class="col-sm-11">
                            <input type="text" style="" class="form-control" id="postTitle"
                                   name="name"
                                   placeholder="لینک اول" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-11">
                            <input type="text" style="" class="form-control" id="postTitle"
                                   name="name"
                                   placeholder="لینک دوم" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-11">
                            <input type="text" style="" class="form-control" id="postTitle"
                                   name="name"
                                   placeholder="لینک سوم" value="" required>
                        </div>
                    </div>
            </div>
        </div>
            <div class=" row ">
                <div class="col-sm-10 m-auto">
                    <button type="submit" class="btn btn-green"><i class="fa fa-save"></i> ثبت اطلاعات</button>
                </div>
            </div>
        </form>
        <div style="background-color: #721c24; width: 100%; height: 1px" class="mt-3"></div>

        <div class="row mt-4" >
            <h4 class="text-dark" style="font-family: Vazir; ">
                لیست همه کاربران :
            </h4>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">ردیف</th>
                            <th scope="col">نام</th>
                            <th scope="col">ایمیل</th>
                            <th scope="col">شماره تلفن</th>
                            <th scope="col">حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php ($i=0); ?>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th><?php echo e(++$i); ?></th>
                                <td><?php echo e($user->name); ?> </td>
                                <td><?php echo e($user->email); ?></td>
                                <td><?php echo e($user->phone); ?></td>
                                <td><a href="<?php echo e(route('admin-user-remove', $user->id)); ?>" class="btn btn-sm btn-danger">حذف</a></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>