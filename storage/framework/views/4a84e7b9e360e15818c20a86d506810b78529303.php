<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <?php echo $__env->make('include.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>
<body class="rtl">
<div class="mt-5 text-center ">
    <h6 class="m-auto alert alert-danger p-3 fail-message"><?php echo e($description); ?></h6>
    <div class="mt-3">
        <a  href="<?php echo e(route('user-cart')); ?>" class="m-auto btn btn-sm btn-blue">بازگشت به پنل کاربری</a>
    </div>
</div>
</body>
</html>