<?php $__env->startSection('title'); ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Dasbhboard
        </h1>
        <ol class="breadcrumb">
          <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
        </ol>

        <div class="panel-body">
            <?php if(session('status')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>
        </div>

    </section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body ">
                  <h3><span style="font-weight: 400;">Hello</span> <?php echo e(Auth::user()->name); ?></h3>
                  <p class="lead text-muted">Welcome to Quick Force</p>

                  <!-- <h4>Get started</h4>
                  <p><a href="#" class="btn btn-primary">Write your first blog post</a> </p> -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>
<!-- ./row -->
</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app-backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>