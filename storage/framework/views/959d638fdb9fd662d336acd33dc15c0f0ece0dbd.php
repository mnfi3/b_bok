<div id="footer">
    <div class="p-5 rtl">
        <div class="row">
            <div id="contactUs" class="col-md-3 col-sm-6">
                <h5>ارتباط با ما</h5>

                <p class="mt-3"><strong>آدرس : </strong>
                    <br>
                    <?php echo e(\App\Setting::get(\App\Setting::KEY_ADDRESS)->value); ?>

                    <br><br>
                </p>

            </div>

            <div class="col-md-3 col-sm-6">
                <h5>کارشناس انتشارات</h5>
                <ul class="mt-3 p-0" >
                    <li class="m-2">
                        <strong> <?php echo e(\App\Setting::get(\App\Setting::KEY_EXPERT_NAME)->value); ?> </strong>
                    </li>
                    <li class="m-2">
                        <strong>شماره تماس مستقیم:</strong>
                        <span> <?php echo e(\App\Setting::get(\App\Setting::KEY_EXPERT_DIRECT_PHONE)->value); ?></span>
                    </li>
                    <li class="m-2">
                        <strong>شماره تماس داخلی: </strong>
                        <span> <?php echo e(\App\Setting::get(\App\Setting::KEY_EXPERT_INTERNAL_PHONE)->value); ?></span>
                    </li>
                    <li class="m-2">
                        <strong>ایمیل: </strong>
                        <span> <?php echo e(\App\Setting::get(\App\Setting::KEY_EXPERT_EMAIL)->value); ?></span>
                    </li>
                </ul>

            </div>
            <div class="col-md-3 col-sm-6">
                <h5>دبیر انتشارات</h5>
                <ul class="mt-3 p-0">
                    <li class="m-2">
                        <strong> <?php echo e(\App\Setting::get(\App\Setting::KEY_BOSS_NAME)->value); ?></strong>
                    </li>
                    <li class="m-2">
                        <strong>شماره تماس مستقیم:</strong>
                        <span> <?php echo e(\App\Setting::get(\App\Setting::KEY_BOSS_DIRECT_PHONE)->value); ?></span>
                    </li>
                    <li class="m-2">
                        <strong>شماره تماس داخلی: </strong>
                        <span> <?php echo e(\App\Setting::get(\App\Setting::KEY_BOSS_INTERNAL_PHONE)->value); ?></span>
                    </li>
                    <li class="m-2">
                        <strong>ایمیل: </strong>
                        <span> <?php echo e(\App\Setting::get(\App\Setting::KEY_BOSS_EMAIL)->value); ?></span>
                    </li>
                </ul>

            </div>
            <div class="col-md-3 col-sm-6">

                <h5>لینک های داخلی</h5>
                <ul class="p-0 mt-3">
                    <li><a target="_blank" href=" <?php echo e(\App\Setting::get(\App\Setting::KEY_LINK1_URL)->value); ?>"> <?php echo e(\App\Setting::get(\App\Setting::KEY_LINK1_TITLE)->value); ?></a></li>
                    <li><a target="_blank" href=" <?php echo e(\App\Setting::get(\App\Setting::KEY_LINK2_URL)->value); ?>"> <?php echo e(\App\Setting::get(\App\Setting::KEY_LINK2_TITLE)->value); ?></a>
                    <li><a target="_blank" href=" <?php echo e(\App\Setting::get(\App\Setting::KEY_LINK3_URL)->value); ?>"> <?php echo e(\App\Setting::get(\App\Setting::KEY_LINK3_TITLE)->value); ?></a>
                    </li>
                </ul>
            </div>

        </div>


    </div>

</div>

<div id="copyright">
    <div class="row rtl bg-dark footer text-light text-muted m-0 p-2 pt-3">

        <div class="col-md-6">
            <p class="pull-right">
                ©
                تمامی کالاهای این فروشگاه، حسب مورد دارای مجوز های لازم از مراجع مربوطه می باشد

            </p>
        </div>

        <div class="col-md-6">
            <p class="wow fadeInRight" data-wow-duration="1s" dir="rtl">
                طراحی و توسعه
                توسط

                <a target="_blank" class="text-success hover-link ml-1" href="http://www.ezitech.ir/">EziTech </a>
                <span class="mx-4 "></span>
            </p>
        </div>

    </div>
    <div class='scrolltop'>
        <div class='scroll icon'><i class="fa fa-4x fa-angle-up"></i></div>
    </div>

</div>