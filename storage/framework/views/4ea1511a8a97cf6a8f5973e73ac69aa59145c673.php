<div class="col-xs-8">
	<div class="box">
		<div class="box-header">
			<div class="pull-left">
				<!-- <a id="add-button" title="Add New" class="btn btn-success" href=""><i class="fa fa-plus-circle"></i> Add New</a> -->
			</div>
			<div class="pull-right">
				<!-- <form accept-charset="utf-8" method="post" class="form-inline" id="form-filter" action="#">
				<div class="input-group">
				<input type="hidden" name="search">
				<input type="text" name="keywords" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search..." value="">
				<div class="input-group-btn">
				<button class="btn btn-sm btn-default search-btn" type="button"><i class="fa fa-search"></i></button>
				</div>
				</div>
				</form> -->
			</div>
		</div>
		<!-- /.box-header -->
		


		<div class="box-body table-responsive">

			<div class="box_body_section form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
				<?php echo Form::label('Enter User Name *'); ?>

				<?php echo Form::text('name', null, ['class' => 'form-control']); ?>


				<?php if($errors->has('name')): ?>
				    <span class="help-block"><?php echo e($errors->first('name')); ?></span>
				<?php endif; ?>
			</div>

			 
			<div class="box_body_section form-group <?php echo e($errors->has('phone') ? 'has-error' : ''); ?>">
				<?php echo Form::label('Enter Mobile Number *'); ?>

				<?php echo Form::text('phone', null, ['class' => 'form-control', 'placeholder' => '01800000000']); ?>


				<?php if($errors->has('phone')): ?>
				    <span class="help-block"><?php echo e($errors->first('phone')); ?></span>
				<?php endif; ?>
			</div>


			<div class="box_body_section form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
				<?php echo Form::label('Enter Password *'); ?>

				<?php echo Form::password('password', ['class' => 'form-control']); ?>


				<?php if($errors->has('password')): ?>
				    <span class="help-block"><?php echo e($errors->first('password')); ?></span>
				<?php endif; ?>
			</div>


			<div class="box_body_section form-group <?php echo e($errors->has('confirm_password') ? 'has-error' : ''); ?>">
				<?php echo Form::label('Confirm Password *'); ?>

				<?php echo Form::password('confirm_password', ['class' => 'form-control']); ?>


				<?php if($errors->has('confirm_password')): ?>
				    <span class="help-block"><?php echo e($errors->first('confirm_password')); ?></span>
				<?php endif; ?>
			</div>


			<div class="box_body_section form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
				<?php echo Form::label('Email'); ?>

				<?php echo Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'example@gmail.com']); ?>


				<?php if($errors->has('email')): ?>
				    <span class="help-block"><?php echo e($errors->first('email')); ?></span>
				<?php endif; ?>
			</div>


			<div class="box_body_section form-group <?php echo e($errors->has('role') ? 'has-error' : ''); ?>">
				<?php echo Form::label('Select Role *'); ?>

				<?php echo Form::select('role', ['client' => 'Client', 'engineer' => 'Engineer', 'manager' => 'Manager'], null, ['class' => 'form-control']); ?>


				<?php if($errors->has('role')): ?>
				    <span class="help-block"><?php echo e($errors->first('role')); ?></span>
				<?php endif; ?>
			</div>


			


			<div class="box_body_section form-group <?php echo e($errors->has('active') ? 'has-error' : ''); ?>">
				<label>
					<?php echo Form::hidden('active', 0); ?>

					<?php echo Form::checkbox( 'active', 1, true, ['class' => 'flat-red'] ); ?>

					<span>&nbsp; User Active *</span>
				</label>

				<?php if($errors->has('active')): ?>
				    <span class="help-block"><?php echo e($errors->first('active')); ?></span>
				<?php endif; ?>
			</div>


			




		</div>
		<!-- /.box-body -->
		<div class="box-footer clearfix">
			
		</div>
	</div>
  	<!-- /.box -->



  	<div class="box">
  		<div class="box-header">
  			<div class="pull-left">
  				<!-- <a id="add-button" title="Add New" class="btn btn-success" href=""><i class="fa fa-plus-circle"></i> Add New</a> -->
  			</div>
  			<div class="pull-right">
  				
  			</div>
  		</div>
  		<!-- /.box-header -->


  		<div class="box-body table-responsive">

  			<div class="box_body_section form-group">
  				
  				<?php echo Form::submit('Save', ['class' => 'btn btn-success btn-lg pull-right']); ?>

  			</div>


  		</div>
  		<!-- /.box-body -->

  		<div class="box-footer clearfix">
  			
  		</div>
  		
  	</div> <!-- /.box -->


</div>




<div class="col-xs-12">
	


</div>




<?php $__env->startSection('script'); ?>


<script type="text/javascript">
	jQuery(function($){
		//iCheck for checkbox and radio inputs
		$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
			checkboxClass: 'icheckbox_minimal-blue',
			radioClass   : 'iradio_minimal-blue'
		});

		//Flat red color scheme for iCheck
	    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
	      checkboxClass: 'icheckbox_flat-green',
	      radioClass   : 'iradio_flat-green'
	    });
	});
</script>


<?php $__env->stopSection(); ?>