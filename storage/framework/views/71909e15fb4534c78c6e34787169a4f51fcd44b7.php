<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=f, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <style>
        input{
            margin:10px 0px;
        }
    </style>
</head>

<body>
    <div class="main">
        <?php echo $__env->yieldContent('content'); ?>;
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\laravelproject\resources\views/layouts/app.blade.php ENDPATH**/ ?>