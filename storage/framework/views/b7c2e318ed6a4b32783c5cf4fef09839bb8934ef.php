<div class="top-bg text-white rtl">
    <div class="d-flex text-center p-1">
        <div class="col-4  text-right d-none flex-row justify-content-start	align-items-end p-2 align-self-end d-md-flex">
            <a href="<?php echo e(route('site-home')); ?>" class="btn btn-light m-1  d-none"> <i class="fa fa-home"></i> صفحه اصلی</a>
        </div>
        <div class="m-auto">
            <img src="<?php echo e(asset('img/bonabLogo.png')); ?>" style="width: 60px;height: 70px" class=" logo mt-3" alt="لوگو دانشگاه بناب">
            <h3 class="text-white p-3" >انتشارات دانشگاه بناب</h3>
        </div>

        <?php
            $user = auth()->user();
            if($user !== null){
                $cart = $user->cart;
                if($cart !== null){
                    $contents = $cart->contents;
                    $count = sizeof($contents);
                }
            }else{
                $count = 0;
            }
        ?>
        <div class=" col-4 text-left d-none flex-row justify-content-end	align-items-end p-2 align-self-end d-md-flex ">
            <?php if(auth()->guard()->check()): ?>
                <?php if(auth()->user()->role == 'user'): ?>
                    <a href="<?php echo e(route('user-cart')); ?>" class="btn btn-green m-1"> سبد خرید <?php echo e($count); ?> <i
                                class="fa fa-shopping-basket"></i>
                    </a>
                <?php endif; ?>
            <?php endif; ?>
        </div>

    </div>
    <div id="test" class="d-flex justify-content-around  d-md-none">

        <div class="col-4 text-left d-flex flex-row justify-content-end	align-items-end p-2 align-self-end">
            <?php if(auth()->guard()->check()): ?>
                <?php if(auth()->user()->role == 'user'): ?>
                    <a href="<?php echo e(route('user-cart')); ?>" class="btn btn-light m-1"> سبد خرید <?php echo e($count); ?> <i
                                class="fa fa-shopping-basket"></i>
                    </a>
                <?php endif; ?>
            <?php endif; ?>
        </div>

    </div>

</div>

<nav class="navbar navbar-expand-md navbar-dark navbar-custom">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="<?php echo e(route('site-home')); ?>" class="nav-link"> <i class="fa fa-home"></i> صفحه اصلی</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contactUs" ><i class="fa fa-envelope-square mrd-flex text-center p-1-2"></i>ارتباط با ما</a>
                </li>
                <?php if(auth()->guard()->guest()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('register')); ?>">ثبت نام</a>
                    </li>
                <?php endif; ?>
                <?php if(auth()->guard()->check()): ?>
                    <?php if(auth()->user()->role == 'user'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('user-cart')); ?>"> <i
                                    class="fa fa-shopping-basket"></i>سبد خرید</a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                <?php if(auth()->guard()->guest()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('login')); ?>">ورود به حساب</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link " style="color: darkorange!important;" href="<?php echo e(route('home')); ?>">ورود به پنل کاربری</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('logout')); ?>"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            خروج
                        </a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>



