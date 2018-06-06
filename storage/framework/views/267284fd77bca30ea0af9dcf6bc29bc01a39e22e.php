<?php $__env->startSection('title'); ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Add New
          <!-- <small>Cases</small> -->
        </h1>
        <ol class="breadcrumb">
          <li><i class="fa fa-dashboard"></i> <a href="#">Dashboard</a></li>
          <li class="active">Cases</li>
        </ol>

        <div class="panel-body">
            <?php if(session('message')): ?>
                <div class="alert alert-info">
                    <?php echo e(session('message')); ?>

                </div>
            <?php endif; ?>
        </div>

    </section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <!-- Main content -->
    <section class="content">
	
      	<div class="row">

			<?php echo Form::model($user, [
			  'method' => 'POST',
			  'route'  => 'backend.user.store',
			  'files'  => TRUE,
			  'id' => 'user-form'
			]); ?>


				<?php echo $__env->make('backend.user.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

			<?php echo Form::close(); ?>




      	</div>
    	<!-- ./row -->

		<div class="row">
			<div class="footer_section">
				<div class="col-xs-12">
					
					<div class="box">

						<div class="box-footer clearfix">
							<a href="<?php echo e(route('backend.user.index')); ?>"><i class="fa fa-angle-left fa-lg"></i>&nbsp; Back to list</a>
						</div>
					</div>
		          <!-- /.box -->


				</div>
			</div>
		</div>

    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.layouts.app-backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>