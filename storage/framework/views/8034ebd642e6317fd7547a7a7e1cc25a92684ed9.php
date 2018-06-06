<?php $__env->startSection('title'); ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          All Tickets
          <!-- <small></small> -->
        </h1>
        <ol class="breadcrumb">
          <li><i class="fa fa-dashboard"></i> <a href="#">Dashboard</a></li>
          <li class="active">Tickets</li>
        </ol>
        
    </section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
              
            <div class="box-body table-responsive">
              <table class="table table-bordered table-condesed">
                <thead>
                    <tr>
                      <th style="width: 80px;">Ticket ID</th>
                      <th>Site ID  - Problem Type</th>
                      <th style="width: 180px;">Created By</th>
                      <th style="width: 150px;">Ticket Status</th>
                      <th style="width: 180px;">Time</th>
                      <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if($user->roles[0]->name != 'admin' &&  $ticket->ticket_status == 'archieved' ): ?>
                            <?php continue; ?>
                        <?php elseif($user->roles[0]->name == 'client' && $ticket->user->id != $user->id): ?>
                            <?php continue; ?>
                        <?php elseif($user->roles[0]->name == 'engineer' && $ticket->assigned_engineer_id != $user->id): ?>
                            <?php continue; ?>
                        <?php endif; ?>

                        <tr>
                        <td><?php echo e(str_pad($ticket->id, 4, '0', STR_PAD_LEFT)); ?></td>
                        <td><a href="<?php echo e(route('backend.ticket.show', $ticket->id)); ?>"><?php echo e($ticket->site_id); ?> - <?php echo e($ticket->ticket_type); ?></a></td>
                        <td>
                            
                            <?php if($ticket->user): ?>
                            <?php echo e($ticket->user->name); ?>

                            <?php endif; ?>
                        </td>
                            
                            <?php if( $ticket->ticket_status == 'new' ): ?>
                                <td><span class="label label-default"><?php echo e($ticket->ticket_status); ?></span></td>
                            <?php elseif( $ticket->ticket_status == 'acknowledged' ): ?>
                                <td><span class="label label-info"><?php echo e($ticket->ticket_status); ?></span></td>
                            <?php elseif( $ticket->ticket_status == 'assigned' ): ?>
                                <td><span class="label label-primary"><?php echo e($ticket->ticket_status); ?></span></td>
                            <?php elseif( $ticket->ticket_status == 'in-progress' ): ?>
                                <td><span class="label label-warning"><?php echo e($ticket->ticket_status); ?></span></td>
                            <?php elseif( $ticket->ticket_status == 'completed' ): ?>
                                <td><span class="label label-success"><?php echo e($ticket->ticket_status); ?></span></td>
                            <?php elseif( $ticket->ticket_status == 'failed' ): ?>
                                <td><span class="label label-danger"><?php echo e($ticket->ticket_status); ?></span></td>
                            <?php elseif( $ticket->ticket_status == 'archieved' ): ?>
                                <td><span class="label label-danger"><?php echo e($ticket->ticket_status); ?></span></td>
                            <?php endif; ?>

                        
                            <td><abbr title="2016/12/04 6:32:00 PM"><?php echo e(date('d-m-Y h:i A', strtotime($ticket->raised_time))); ?></abbr></td>
                            <td width="100">
                                <a title="View" class="btn btn-xs btn-default edit-row" href="<?php echo e(route('backend.ticket.show', $ticket->id)); ?>">
                                <i class="fa fa-eye"></i>
                                </a>
                                <?php if( (check_user_permissions(request(), 'Ticket@edit')) && ($ticket->ticket_status == "new")): ?>
                                <a title="Edit" class="btn btn-xs btn-default edit-row" href="<?php echo e(route('backend.ticket.edit', $ticket->id)); ?>">
                                <i class="fa fa-edit"></i>
                                </a>
                                <?php endif; ?>
                                <?php if( check_user_permissions(request(), 'Ticket@destroy') ): ?>
                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['backend.ticket.destroy', $ticket->id], 'class' => 'd_inline_b']); ?>

                                
                                    <button type="submit" class="btn btn-xs btn-danger" onClick="return confirm('Are you sure you want to delete?')">
                                        <i class="fa fa-times"></i>
                                    </button>
                                <?php echo Form::close(); ?>

                                <?php endif; ?>
                        </td>
                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <?php echo $tickets->links(); ?>

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