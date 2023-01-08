<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>404 - <?php echo e(__('Page Not Found ')); ?></title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:700,900" rel="stylesheet">

	<!-- Custom stlylesheet -->
	<link href="<?php echo e(url('css/error.css')); ?>" rel="stylesheet" type="text/css"/> 



</head>


<body>

	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1>404</h1>
				<h2><?php echo e(__('Page not found')); ?></h2>
			</div>
			<a href=<?php echo e(url('/')); ?>><?php echo e(__('Homepage')); ?></a>
		</div>
	</div>

</body>

</html><?php /**PATH /home/sayed/Desktop/Next Hour/nexthour/resources/views/errors/404.blade.php ENDPATH**/ ?>