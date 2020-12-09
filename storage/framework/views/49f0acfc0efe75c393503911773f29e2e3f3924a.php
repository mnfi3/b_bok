<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<script src="<?php echo e(asset('js/jquery.min.js')); ?>" ></script>
<script src="<?php echo e(asset('js/persian-date.min.js')); ?>" ></script>
<script src="<?php echo e(asset('js/persian-datepicker.min.js')); ?>" ></script>
<script>
  (function ($) {
    $(document).ready(function () {
      $(".start-day").persianDatepicker({
        format: 'YYYY/MM/DD',
        timePicker: {
          enabled: false
        }
      })
    });
  })
  (window.jQuery);
</script>


<title><?php echo e(config('app.name', 'Laravel')); ?></title>




<!-- Styles -->

<link rel="stylesheet" href="<?php echo e(asset('css/persian-datepicker.min.css')); ?>">
<link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('css/all.css')); ?>" rel="stylesheet">
<link rel="shortcut icon" type="image/png" href="<?php echo e(asset('favicon.png')); ?>"/>

<!-- Scripts -->
<script src="<?php echo e(asset('js/bundle.js')); ?>" defer></script>
