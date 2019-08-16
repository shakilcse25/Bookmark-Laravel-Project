<?php $__env->startSection('content'); ?>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="text-center">My Bookmarks List</h1>
                <p class="text-center">Secure and useful bookmarks lister for you.</p>
            </div>
        </div>
        <div class="add_bookmark container-fluid">

            <button type="button" class="btn btn-primary" style="margin: 10px 0px;" data-toggle="modal" data-target="#addbookmark">
                Add Bookmmark
            </button>




            <!-- add bookmark -->
            <div class="modal" id="addbookmark">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Add a new Bookmark Here.</h4>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <?php if($errors->any()): ?>

                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="alert alert-danger small">
                                        <p> <?php echo e($error); ?> </p>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <script type='text/javascript'>
                                    jQuery(document).ready(function () {
                                        jQuery('#addbookmark').modal('show');
                                    });
                                </script>

                            <?php endif; ?>

                            <form action="/create_bookmark" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="text" class="form-control" name='title' placeholder="Page title" >
                                <input type="text" class="form-control" name='link' placeholder="Page URL" >
                                <input type="text" class="form-control" name='tag' placeholder="Page Tag" >
                                <input type="submit" name="bookmark" class="btn btn-success" value="Create Bookmark">
                            </form>
                        </div>



                    </div>
                </div>
            </div>
        </div>
        <div class="bookmark_table container-fluid">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr class="text-center">
                            <th>Number</th>
                            <th>Link</th>
                            <th>Tag</th>
                            <th>Action</th>
                        </tr>
                        <?php $i = 0; ?>
                        <?php $__currentLoopData = $bookmarks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $i++;  ?>
                            <tr class="text-center">
                                <td><?php echo e($i); ?></td>
                                <td><a href="<?php echo e($value->link); ?>" target="blank"><?php echo e($value->title); ?></a></td>
                                <td><?php echo e($value->tag); ?></td>
                                <td> <a href="/bookmark/<?php echo e($value->id); ?>" style="margin-right: 5px;"
                                        class="btn btn-info text-white">Edit</a> <a href="/delete/<?php echo e($value->id); ?>" class="btn btn-danger text-white">Delete</a> </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php
                            if (isset($singlebookmark)) {
                        ?>
                            <script type='text/javascript'>
                                jQuery(document).ready(function () {
                                    jQuery('#updatebookmark').modal(
                                        'show');
                                });
                            </script>


                        <!-- Update bookmark -->
                        <div class="modal" id="updatebookmark">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Add a new Bookmark Here.</h4>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <?php if($errors->any()): ?>

                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="alert alert-danger small">
                                            <p> <?php echo e($error); ?> </p>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <script type='text/javascript'>
                                            jQuery(document).ready(function () {
                                                jQuery('#updatebookmark').modal('show');
                                            });
                                        </script>

                                        <?php endif; ?>
                                        <form action="/update_bookmark/<?php echo e($singlebookmark->id); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <input type="text" class="form-control" name='title'
                                                placeholder="Page title" value="<?php echo e($singlebookmark->title); ?>">
                                            <input type="text" class="form-control" name='link'
                                                placeholder="Page URL" value="<?php echo e($singlebookmark->link); ?>">
                                            <input type="text" class="form-control" name='tag'
                                                placeholder="Page Tag" value="<?php echo e($singlebookmark->tag); ?>">
                                            <input type="submit" name="bookmark" class="btn btn-success"
                                                value="Update Bookmark">
                                        </form>
                                    </div>



                                </div>
                            </div>
                        </div>

                                                <?php
                            }
                        ?>

                    </table>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravelproject\resources\views/bookmarks/index.blade.php ENDPATH**/ ?>