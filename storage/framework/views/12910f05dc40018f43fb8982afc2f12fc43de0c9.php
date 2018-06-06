<?php $__env->startSection('title'); ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Tickets
          <!-- <small>Cases</small> -->
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
					<div class="box-header">
						<div class="pull-left">
							<h3>Ticket Details</h3>
						</div>
						<div class="pull-right">
							<?php if(check_user_permissions(request(), 'Ticket@edit') && ($tickets->ticket_status == 'new')): ?>
							<a href="<?php echo e(route('backend.ticket.edit', $tickets->id)); ?>" class="btn btn-primary edit_ticket m_top_15 m_bottom_15"><i class="fa fa-pencil-square-o fa-md"></i>&nbsp; Edit Case</a>
							<?php endif; ?>
						</div>
					</div>
					<!-- /.box-header -->
				</div>
	          <!-- /.box -->
			</div>
		</div>
		
		
		<div class="row">
			<div class="col-xs-12">
				
				<div>
		            
		            <div class="tab-content">

		              	<div class="tab-pane active" id="tab_1">
		                	
							<div class="row">
								<div class="col-xs-12">
										<div class="box">
												 
												<!-- /.box-header -->
												<div class="box-body table-responsive">
												  <table class="table table-bordered table-condesed">
													<tbody>
														
														<tr>
															<td><strong>Ticket Number</strong></td>
															<td><?php echo e($tickets->ticket_number); ?></td>	 
														</tr>
													  
														<tr>
															<td><strong>Site ID</strong></td>
															<td><?php echo e($tickets->site_id); ?></td>	 	 
														</tr>
														<tr>
															<td><strong>Zone</strong></td>
															<td><?php echo e($site->zone); ?></td>	 	 	 
														</tr>
														<tr>
															<td><strong>Vendor Name</strong></td>
															<td><?php echo e($tickets->vendor_name); ?></td>	 
														</tr>
														<tr>
															<td><strong>Raised Time</strong></td>
															<td><?php echo e($tickets->raised_time); ?></td>	 
														</tr>
														<tr>
															<td><strong>Raised E.CO Concern Name</strong></td>
															<td><?php echo e($tickets->user->name); ?></td>	 
														</tr>
														<tr>
															<td><strong>Assigner Cell No</strong></td>
															<td><?php echo e($tickets->user->phone); ?></td>	 
														</tr>
														
														<tr>
															<td><strong>Given For</strong></td>
															<td> </td>	 
														</tr>
														<tr>
															<td><strong>Type</strong></td>
															<td><?php echo e($tickets->ticket_type); ?></td>
														</tr>
														<tr>
															<td><strong>PG Owner</strong></td>
															<td><?php echo e($tickets->pg_owner); ?></td>
														</tr>
														<tr>
															<td><strong>Ticket Created By</strong></td>
															<td><?php if($tickets->user): ?><?php echo e($tickets->user->name); ?><?php endif; ?></td>
														</tr>
														<tr>
															<td><strong>Assigend Engineer</strong></td>
															<td>	
																<?php if($assigned_engineer!=null): ?>
																	<?php echo e($assigned_engineer->name); ?>

																<?php else: ?> NOT ASSIGNED
																<?php endif; ?></strong></td>	 
														</tr>
														<tr>
														  <td><span class=""><strong>Ticket Status</strong></span></td>
		
															  <?php if( $tickets->ticket_status == 'new' ): ?>
																  <td><span class="label label-default"><?php echo e($tickets->ticket_status); ?></span></td>
															  <?php elseif( $tickets->ticket_status == 'acknowledged' ): ?>
																  <td><span class="label label-info"><?php echo e($tickets->ticket_status); ?></span></td>
															  <?php elseif( $tickets->ticket_status == 'assigned' ): ?>
																  <td><span class="label label-primary"><?php echo e($tickets->ticket_status); ?></span></td>
															  <?php elseif( $tickets->ticket_status == 'in-progress' ): ?>
																  <td><span class="label label-warning"><?php echo e($tickets->ticket_status); ?></span></td>
															  <?php elseif( $tickets->ticket_status == 'completed' ): ?>
																  <td><span class="label label-success"><?php echo e($tickets->ticket_status); ?></span></td>
															  <?php elseif( $tickets->ticket_status == 'failed' ): ?>
																  <td><span class="label label-danger"><?php echo e($tickets->ticket_status); ?></span></td>
															   <?php elseif( $tickets->ticket_status == 'archieved' ): ?>
																  <td><span class="label label-danger"><?php echo e($tickets->ticket_status); ?></span></td>
															  
															   <?php endif; ?>
		
														  
		
														</tr>
													</tbody>
												  </table>
												</div>
												<!-- /.box-body -->
		
												
											</div>
								</div>
								
							</div>
							<?php if(Auth::user()->roles[0]->name != 'client'): ?>
							<div class="row">
									<div class="col-xs-12">
										<!-- Additional ticket information by Admin -->
										<div class="box">
											<div class="box-header">
												<h3>Ticket Operations</h3>
											
											</div>
											<!-- /.box-header -->
 
 
											<div class="box-body table-responsive">
												<div>
													<hr>
													 
													<?php if( check_user_permissions(request(), 'Ticket@TicketChangeStatusManager') ): ?>
														<!-- Button trigger modal -->
														<?php echo Form::open(['method' => 'POST', 'route' => ['backend.ticket.change.statusmanager', $tickets->id], 'class' => 'd_block']); ?>

	
														<?php if(check_user_permissions(request(), 'Ticket@destroy')): ?>
															<?php if($tickets->ticket_status != 'archieved'): ?>
																<button type="submit" name="ticket_status_action" value="archieved" class="btn btn-danger btn-lg pull-right">Archieve Ticket</button>
															<?php else: ?> 
																<button type="submit" name="ticket_status_action" value="unarchieved" class="btn btn-success btn-lg pull-right">Un-archieve Ticket</button>
															<?php endif; ?>
														<?php endif; ?>	
														
														<?php if($tickets->ticket_status == 'new'): ?>
															<button type="submit" name="ticket_status_action" value="acknowledged" class="btn btn-info btn-lg pull-right m_right_15">Acknowledge Ticket</button>
														<?php elseif($tickets->ticket_status == 'acknowledged'): ?>
															<button type="button" id="hd_add_ticket_info_button" data-toggle="modal" data-target="#manager_modal" class="btn btn-primary btn-lg pull-right m_right_15">Assign an Engineer</button>
														<?php elseif($tickets->ticket_status == 'assigned'): ?>
															<button type="button" id="hd_add_ticket_info_button" data-toggle="modal" data-target="#manager_modal" class="btn btn-primary btn-lg pull-right m_right_15">Re-assign an Engineer</button>
														<?php elseif($tickets->ticket_status == 'failed'): ?>
															<button type="button" id="hd_add_ticket_info_button" data-toggle="modal" data-target="#manager_modal" class="btn btn-primary btn-lg pull-right m_right_15">Re-assign an Engineer</button>
														<?php elseif(($tickets->ticket_status == 'in-progress') && (Auth::user()->roles[0]->name != 'admin')): ?> 
															<div class="card bg-warning text-white">
																<hr>
																<div class="card-body"><strong> >> THE TICKET IS IN PROGRESS......</strong></div>
															</div>
														<?php elseif(($tickets->ticket_status == 'completed') && (Auth::user()->roles[0]->name != 'admin')): ?>
															
															<div class="card bg-success text-white">
																<div class="card-body"><strong>>> THE TICKET IS COMPLETED</strong></div>
															</div>	
														<?php endif; ?>
															
														<?php echo Form::close(); ?>


												</div>
												
												<!-- Modal -->
												<div class="modal fade" id="manager_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
													  <div class="modal-dialog modal-lg" role="document">
														<div class="modal-content">
 
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																	<h4 class="modal-title" id="myModalLabel">Assign an Engineer</h4>
																</div>
																<div class="modal-body">
 
																	<div class="box-body table-responsive">
																		<table class="table table-bordered table-condesed">
																		  <thead>
																			  <tr>
																				<th style="width: 60px">User ID</th>
																				<th style="width: 200px">Name</th>
																				<th style="width: 70px">Status</th>
																				<th style="width: 40px">ETA</th>
																				<th style="width: 30px">ERT</th>
																				<th style="width: 40px">Action</th>
																			  </tr>
																		  </thead>
																		  <tbody>
																			  
																			  <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																			  <?php if( isset($user->roles[0]->name) && $user->roles[0]->name == 'engineer'): ?>
																				<tr>
																			  
																				<td><?php echo e(str_pad($user->id, 4, '0', STR_PAD_LEFT)); ?></td>
																				<td width="80">
																					<span class="label label-info"><?php echo e(isset($user->roles[0]->display_name) ? $user->roles[0]->display_name : ''); ?></span>
																					<a href="<?php echo e(route('backend.user.show', $user->id)); ?>"><?php echo e($user->name); ?></a>
																				</td>
																				<td>
																					<?php if($user->free==0): ?>
																						<span class="label label-warning">WORKING</span>
																					<?php else: ?> <span class="label label-success">AVAILABLE</span>
																					<?php endif; ?>
																				</td>
																				<td>
																					<?php if($user->free==0): ?>
																						<span class="label label-info"><?php echo e(date('d-m-Y H:i:s', strtotime($user->eta))); ?></span>
																					<?php else: ?> <span class="label label-default">---</span>
																					<?php endif; ?>
																				</td>
																				<td>
																						<?php if($user->free==0): ?>
																							<span class="label label-info"><?php echo e($user->ert); ?> Hours</span>
																						<?php else: ?> <span class="label label-default">---</span>
																						<?php endif; ?>
																					</td>
																				<td>
																						
																					 
																					<?php echo Form::open(['method' => 'POST', 'route' => ['backend.ticket.change.statusmanager', $tickets->id]]); ?>

 
																						
							
																						<input id="assigned_engineer" type="hidden" class="form-control" name="assigned_engineer" value= <?php echo e($user->id); ?>>

																							<?php if($errors->has('assigned_engineer')): ?>
																							<span class="help-block">
																								<strong><?php echo e($errors->first('assigned_engineer')); ?></strong>
																							</span>
																							<?php endif; ?>

																						<button type="submit" name="ticket_status_action" value="assigned" class="btn btn-primary">Assign Ticket</button>
							
																		   
																					<?php echo Form::close(); ?>

																					 
																				</td>
																			</tr>
																			  <?php endif; ?>
																			  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														  
																		  </tbody>
																		</table>
																	  </div>
																</div>
																<div class="modal-footer clearfix">
																	<button type="button" class="btn btn-default f_left" data-dismiss="modal">Close</button>
																  </div></div> <!-- .modal-content -->
													  </div>
												</div> <!-- modal end -->

												<?php elseif( check_user_permissions(request(), 'Ticket@TicketChangeStatus') ): ?>
													<!-- Button trigger modal -->
													<?php echo Form::open(['method' => 'POST', 'route' => ['backend.ticket.change.status', $tickets->id], 'class' => 'd_block']); ?>

														<?php if($tickets->ticket_status == 'assigned' && Auth::user()->free == 1): ?> 
															<button type="submit" name="ticket_status_action" value="failed" class="btn btn-danger btn-lg pull-right ">Cancel Ticket</button>
															<button type="button" id="hd_add_ticket_info_button" data-toggle="modal" data-target="#engineer_modal" class="btn btn-success btn-lg pull-right m_right_15">Accept Ticket</button>
														<?php elseif($tickets->ticket_status == 'assigned' && Auth::user()->free == 0): ?>
													
																<div><Strong>>> First you have to complete the <span class="label label-info">in-progress</span> ticket, then you can accept this ticket</Strong></div>
																<button type="submit" name="ticket_status_action" value="failed" class="btn btn-danger btn-lg pull-right ">Cancel Ticket</button>
															
														<?php elseif($tickets->ticket_status == 'in-progress'): ?>
															<button type="submit" name="ticket_status_action" value="completed" class="btn btn-success btn-lg pull-right ">Ticket Completed</button>
															<button type="submit" name="ticket_status_action" value="failed" class="btn btn-danger btn-lg pull-right m_right_15">Ticket Failed</button>
														<?php endif; ?>
													<?php echo Form::close(); ?>


												<!-- Modal -->
												<div class="modal fade" id="engineer_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
														<div class="modal-dialog modal-lg" role="document">
														  <div class="modal-content">
   
																  <div class="modal-header">
																	  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																	  <h4 class="modal-title" id="myModalLabel">Accept Ticket</h4>
																  </div>
																  <div class="modal-body">
   
																	  <div class="box-body table-responsive">
																			<?php echo Form::open(['method' => 'POST', 'route' => ['backend.ticket.change.status', $tickets->id]]); ?>

  
																	
																			<div class="box_body_section form-group">
																					<label>ETA (Expected Time of Arrival):</label>
																	
																					<div class="input-group date">
																					  <div class="input-group-addon">
																						<i class="fa fa-calendar"></i>
																					  </div>
																					  <input name="eta" type="text" class="form-control pull-right" id="datepicker" required>
																					</div>
																					<!-- /.input group -->
																			</div>
																			<div class="box_body_section form-group">
																						<label>ERT (Expected Result Time in hours):</label>
																		
																						  <input name="ert" type="number" class="form-control pull-left" required>
																						
																			</div>
																			<div class="box-body table-responsive">
																					<div class="box_body_section form-group">
																						<button type="submit" name="ticket_status_action" value="in-progress" class="btn btn-success vtn-lg pull-right">Accept Ticket</button>
																					</div>
																			</div>
																			<?php echo Form::close(); ?>

																		</div>
																  </div>
																  <div class="modal-footer clearfix">
																	  <button type="button" class="btn btn-default f_left" data-dismiss="modal">Close</button>
																	</div></div> <!-- .modal-content -->
														</div>
												  </div> <!-- modal end -->

												<?php endif; ?>
 
											</div>
											<!-- /.box-body -->
 
											<div class="box-footer clearfix">
 
											</div>
										</div>
										<!-- /.box -->
									</div>
								</div>
								<?php endif; ?>
		              	</div>
			            <!-- /.tab-pane -->

		            </div>
		            <!-- /.tab-content -->
		        </div> <!-- .nav-tabs-custom -->
				 
			</div> 

		</div> <!-- .row -->

		<div class="row">
			<div class="footer_section">
				<div class="col-xs-12">
					
					<div class="box">

						<div class="box-footer clearfix">
							<a href="<?php echo e(route('backend.ticket.index')); ?>"><i class="fa fa-angle-left fa-lg"></i>&nbsp; Back to list</a>
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

<?php $__env->startSection('scripts'); ?>
<?php echo Html::script('js/myscript.js'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app-backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>