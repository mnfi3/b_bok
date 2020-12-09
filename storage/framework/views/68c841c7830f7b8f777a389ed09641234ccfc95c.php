<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <?php echo $__env->make('include.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>
<body class="rtl">
<div id="app">
    <div class='thetop'></div>
    <?php echo $__env->make('include.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <main class="bg-texture">
        <div class="text-center py-2">
            <span style="font-size: 1.3em" class="alert alert-success p-1">ارسال رایگان <i class="fa fa-truck text-info"></i></span>
        </div>
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    <?php echo $__env->make('include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
</body>
</html>
