<?php
	$error_number = 500;
?>

<?php $__env->startSection('title'); ?>
	It's not you, it's me.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('description'); ?>
	<?php
	  $default_error_message = "An internal server error has occurred. If the error persists please contact the development team.";
	?>
	<?php echo isset($exception)? ($exception->getMessage()?$exception->getMessage():$default_error_message): $default_error_message; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('errors.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>