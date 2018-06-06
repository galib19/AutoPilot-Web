<?php $__env->startSection('title'); ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          All Users
          <!-- <small></small> -->
        </h1>
        <ol class="breadcrumb">
          <li><i class="fa fa-dashboard"></i> <a href="#">Dashboard</a></li>
          <li class="active">Users</li>
        </ol>

        

    </section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
              <div class="box-header">
                  
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
              <table class="table table-bordered table-condesed">
                <thead>
                    <tr>
                      <th style="width: 80px;">User ID</th>
                      <th>Name</th>
                      <th>Role</th>
                      <th>Acive</th>
                      <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						
					<?php if( $user->active == 0 || $user->id == 1 ): ?>
						<tr style="opacity: 0.7;">
					<?php else: ?>
						<tr>
					<?php endif; ?>
					
                    
                      <td><?php echo e(str_pad($user->id, 4, '0', STR_PAD_LEFT)); ?></td>
                      <td><a href="<?php echo e(route('backend.user.show', $user->id)); ?>"><?php echo e($user->name); ?></a></td>
                      <td width="200">
						
						<?php if( isset($user->roles[0]->name) && $user->roles[0]->name == 'admin' ): ?>
							<span class="label label-danger"><?php echo e(isset($user->roles[0]->display_name) ? $user->roles[0]->display_name : ''); ?></span>
						<?php elseif( isset($user->roles[0]->name) && $user->roles[0]->name == 'manager' ): ?>
							<span class="label label-success"><?php echo e(isset($user->roles[0]->display_name) ? $user->roles[0]->display_name : ''); ?></span>
						<?php elseif( isset($user->roles[0]->name) && $user->roles[0]->name == 'engineer' ): ?>
							<span class="label label-primary"><?php echo e(isset($user->roles[0]->display_name) ? $user->roles[0]->display_name : ''); ?></span>
						<?php elseif( isset($user->roles[0]->name) && $user->roles[0]->name == 'client' ): ?>
							<span class="label label-info"><?php echo e(isset($user->roles[0]->display_name) ? $user->roles[0]->display_name : ''); ?></span>
						<?php else: ?>
							<span class="label label-info"><?php echo e(isset($user->roles[0]->display_name) ? $user->roles[0]->display_name : ''); ?></span>
						<?php endif; ?>
                      	

                      </td>
                      <td width="100"><abbr><?php if( $user->active == 1 ): ?><?php echo e('Yes'); ?> <?php else: ?> <?php echo e('No'); ?> <?php endif; ?></abbr></td>

                      <td width="100">
                            <a title="View" class="btn btn-xs btn-default edit-row" href="<?php echo e(route('backend.user.show', $user->id)); ?>">
                                <i class="fa fa-eye"></i>
                            </a>
                            <?php if( Auth::user()->roles[0]->name == ('admin') ): ?>
                                <a title="Edit" class="btn btn-xs btn-default edit-row" href="<?php echo e(route('backend.user.edit', $user->id)); ?>">
                                <i class="fa fa-edit"></i>
                                </a>
                            <?php endif; ?>
                          
                      </td>
                    </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <?php echo $users->links(); ?>

              </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
    <!-- ./row -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.layouts.app-backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>