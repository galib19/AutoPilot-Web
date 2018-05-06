@extends('backend.layouts.app-backend')


@section('title')

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

@endsection


@section('content')

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
							@if( check_user_permissions(request(), 'CaseIncedent@edit') )
							<a href="{{ route('backend.case.edit', $cases->id) }}" class="btn btn-primary edit_case m_top_15 m_bottom_15"><i class="fa fa-pencil-square-o fa-md"></i>&nbsp; Edit Case</a>
							@endif
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
								<div class="col-xs-6">
									
									<div class="box">
										<div class="box-header">
											<div class="pull-left">
												<!-- <a id="add-button" title="Add New" class="btn btn-success" href="{{ route('backend.case.create') }}"><i class="fa fa-plus-circle"></i> Add New</a> -->
											</div>
											<div class="pull-right">
												
											</div>
										</div>
										<!-- /.box-header -->


										<div class="box-body table-responsive">

											<div class="box_body_section">
												<h4>Ticket ID</h4>
												<div class="box_body_section_content">
													<p>{{ str_pad($cases->id, 4, "0", STR_PAD_LEFT) }}</p>
												</div>
											</div>
											<hr>
											<div class="box_body_section">
												<h4>Tower ID</h4>
												<div class="box_body_section_content">
													<p><strong>{{ $cases->case_title }}</strong></p>
												</div>
											</div>
											<hr>
											<div class="box_body_section">
												<h4>Details</h4>
												<div class="box_body_section_content">
													<p>{{ $cases->case_details }}</p>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-xs-6">
										<div class="box">
												<div class="box-header">
													<h3>Additinal Ticket Information</h3>
													<div class="pull-left">
														<!-- <a id="add-button" title="Add New" class="btn btn-success" href="{{ route('backend.case.create') }}"><i class="fa fa-plus-circle"></i> Add New</a> -->
													</div>
													<div class="pull-right">
														
													</div>
												</div>
												<!-- /.box-header -->
												
												
												{{-- $action_taken --}}
		
												<div class="box-body table-responsive">
												  <table class="table table-bordered table-condesed">
													<tbody>
														
														<tr>
														  <td><span class=""><strong>Ticket Status</strong></span></td>
		
															  @if( $cases->case_status == 'in progress' )
																  <td><span class="label label-success">{{ $cases->case_status }}</span></td>
															  @elseif( $cases->case_status == 'assigned' )
																  <td><span class="label label-info">{{ $cases->case_status }}</span></td>
															  @elseif( $cases->case_status == 'archieved' )
																  <td><span class="label label-danger">{{ $cases->case_status }}</span></td>
															  @else
																  <td><span class="label label-default">{{ $cases->case_status }}</span></td>
															  @endif
		
														  {{-- <td><span class="label label-info">{{ $cases->case_status }}</span></td> --}}
		
														</tr>

														<tr>
															<td><strong>Ticket Created By</strong></td>
															<td>@if($cases->user){{ $cases->user->name }}@endif</td>
														</tr>

														<tr>
																<td><strong>Assigned To</strong></td>
																<td>
																	
																	@if($assigned_engineer!=null)
																	{{ $assigned_engineer->name }}
																	@endif
																	</td>
															</tr>

														<tr>
																<td><span class=""><strong>Type of Failure</strong></span></td>
																<td><span class="text-red">{{ $violence_type[$cases->case_type] or '' }}</span></td>
														</tr>
														<tr>
																<td><strong>Date of Incident</strong></td>
																<td>{{ date('d-m-Y', strtotime($cases->incident_date)) }} </td>
															</tr>

													</tbody>
												  </table>
												</div>
												<!-- /.box-body -->
		
												
											</div>
								</div>
								
							</div>
							<div class="row">
									<div class="col-xs-12">
										<!-- Additional case information by Admin -->
										<div class="box">
											<div class="box-header">
												<h3>Ticket Operations</h3>
											
											</div>
											<!-- /.box-header -->
 
 
											<div class="box-body table-responsive">
 
												<!-- // Case Info by admin -->
 
												<div id="admin_show_case_info" class="admin_show_case_info" data-countadmin="0">
 
													<div class="single_admin_show_case_info">
														<hr>

														@php
 
															if(isset($cases_meta['case_info_admin_count']) && !empty($cases_meta['case_info_admin_count'])){
																
																$admin_data_count = $cases_meta['case_info_admin_count'];
															}
															else{
																$admin_data_count = 0;
															}
	
														@endphp
	
														@if( check_user_permissions(request(), 'CaseIncedent@CaseInfoUpdateAdmin') )
														<!-- Button trigger modal -->
															<div id="admin_add_case_info" class="admin_add_case_info m_top_30" data-count_hd="{{ $admin_data_count }}">
																{{-- <button type="button" id="hd_add_case_info_button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#admin_add_case_info_content">Assign an Engineer</button> --}}
																
																{!! Form::open(['method' => 'POST', 'route' => ['backend.case.change.statusadmin', $cases->id], 'class' => 'd_block']) !!}
 
																	<button type="submit" name="case_status_action" value="archieved" class="btn btn-danger btn-lg pull-right ">Archieve Ticket</button>
																	
																	<button type="button" id="hd_add_case_info_button" data-toggle="modal" data-target="#engineer_modal" class="btn btn-success btn-lg pull-right m_right_15">Accept Ticket</button>
																	@if($assigned_engineer==null)
																	<button type="button" id="hd_add_case_info_button" data-toggle="modal" data-target="#admin_add_case_info_content" class="btn btn-success btn-lg pull-right m_right_15">Assign an Engineer</button>
																	@else 
																	<button type="button" id="hd_add_case_info_button" data-toggle="modal" data-target="#admin_add_case_info_content" class="btn btn-success btn-lg pull-right m_right_15">Re-assign an Engineer</button>
																	@endif
																	
																	
		
													   
																{!! Form::close() !!}
															
															</div>
													 
													</div>
 
												</div>
 
 
 
												
 
 
												<!-- Modal -->
												<div class="modal fade" id="admin_add_case_info_content" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
													  <div class="modal-dialog" role="document">
														<div class="modal-content">
 
															<!-- Content Form -->
															{!! Form::model($cases, [
															  'method' => 'POST',
															  'route'  => ['backend.case.updateadmin', $cases->id],
															  'files'  => TRUE,
															  'id' => 'post-form-admin'
															]) !!}
 
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																	<h4 class="modal-title" id="myModalLabel">Assign an Engineer</h4>
																</div>
																<div class="modal-body">
 
																	<div class="box-body table-responsive">
																		<table class="table table-bordered table-condesed">
																		  <thead>
																			  <tr>
																				<th style="width: 50px;">User ID</th>
																				<th>Name</th>
																				<th>Action</th>
																			  </tr>
																		  </thead>
																		  <tbody>
																			  
																			  @foreach($users as $user)
																			  @if( isset($user->roles[0]->name) && $user->roles[0]->name == 'engineer' && $user->free ==1)
																				<tr>
																			  
																				<td>{{ str_pad($user->id, 4, '0', STR_PAD_LEFT) }}</td>
																				<td width="80">
																					<span class="label label-primary">{{ $user->roles[0]->display_name or '' }}</span>
																					<a href="{{ route('backend.user.show', $user->id) }}">{{ $user->name }}</a>
																				</td>
																				<td width="50">
																						
																					 {{-- @php echo $user->id @endphp --}}
																					{!! Form::open(['method' => 'POST', 'route' => ['backend.case.change.statusadmin', $cases->id]]) !!}
 
																						{{-- <button type="submit" name="case_status_action" value="archive" class="btn btn-default pull-left">Archive Case</button> --}}
							
																						<input id="assigned_engineer" type="hidden" class="form-control" name="assigned_engineer" value= {{ $user->id }}>

																							@if ($errors->has('assigned_engineer'))
																							<span class="help-block">
																								<strong>{{ $errors->first('assigned_engineer') }}</strong>
																							</span>
																							@endif

																						<button type="submit" name="case_status_action" value="assigned" class="btn btn-success">Assign Ticket</button>
							
																		   
																					{!! Form::close() !!}
																					 
																				</td>
																			</tr>
																			  @endif
																			  @endforeach
														  
																		  </tbody>
																		</table>
																	  </div>
																</div>
																<div class="modal-footer clearfix">
																	<button type="button" class="btn btn-default f_left" data-dismiss="modal">Close</button>
																  </div>
 
															
															{!! Form::close() !!}
															<!-- Content Form End -->
 
 
														</div> <!-- .modal-content -->
													  </div>
												</div> <!-- modal end -->

												<!-- Modal -->
												<div class="modal fade" id="engineer_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
													<div class="modal-dialog" role="document">
													  <div class="modal-content">

															  <div class="modal-header">
																  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																  <h4 class="modal-title" id="myModalLabel">Accept Ticket</h4>
															  </div>
															  <div class="modal-body">

																  <div class="box-body table-responsive">
																		{!! Form::open(['method' => 'POST', 'route' => ['backend.case.change.status', $cases->id]]) !!}

																
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
																					<button type="submit" name="case_status_action" value="in-progress" class="btn btn-success vtn-lg pull-right">Accept Ticket</button>
																				</div>
																		</div>
																		{!! Form::close() !!}
																	</div>
															  </div>
															  <div class="modal-footer clearfix">
																  <button type="button" class="btn btn-default f_left" data-dismiss="modal">Close</button>
																</div></div> <!-- .modal-content -->
													</div>
											  </div> <!-- modal end -->
												@endif
 
											</div>
											<!-- /.box-body -->
 
											<div class="box-footer clearfix">
 
											</div>
										</div>
										<!-- /.box -->
									</div>
								 
								 
								</div>
		              	</div>
			            <!-- /.tab-pane -->


		              	<div class="tab-pane" id="tab_2">

		                	<div class="row">
		                		<div class="col-xs-7">
            						<div class="box">
            							<div class="box-header">
            								<h3>Additinal Ticket Information by Field Agent</h3>
            								<div class="pull-left">
            									<!-- <a id="add-button" title="Add New" class="btn btn-success" href="{{ route('backend.case.create') }}"><i class="fa fa-plus-circle"></i> Add New</a> -->
            								</div>
            								<div class="pull-right">
            									
            								</div>
            							</div>
            							<!-- /.box-header -->
            							
            							
            							{{-- $action_taken --}}

            							<div class="box-body table-responsive">
            							  <table class="table table-bordered table-condesed">
            							    <tbody>

            									<tr>
            										<td><strong>Ticket Created By</strong></td>
            										<td>@if($cases->user){{ $cases->user->name }}@endif</td>
            									</tr>

            									
            							        

            							       
            							    </tbody>
            							  </table>
            							</div>
            							<!-- /.box-body -->

            							<div class="box-footer clearfix">

            							</div>
            						</div>
            			          	<!-- /.box -->
		                		</div>
		                		<div class="col-xs-5">
            						<div class="box">
            							<div class="box-header">
            								<h3>Image or Files uploaded by Field Agent</h3>
            								<div class="pull-left">
            									<!-- <a id="add-button" title="Add New" class="btn btn-success" href=""><i class="fa fa-plus-circle"></i> Add New</a> -->
            								</div>
            								<div class="pull-right">
            									
            								</div>
            							</div>
            							<!-- /.box-header -->
            							
            							
            							{{-- $action_taken --}}

            							<div class="box-body table-responsive">
            								
            								@if( isset($cases_meta['fa_multi_images']) )
            								<div class="image_file_list multiple_image_files_fa clearfix">
            									<ul class="clearfix row list-style-none">
            										
            										@foreach( $cases_meta['fa_multi_images'] as $value )
            											
            											<li class="col-sm-4">
            												<a href="{{ asset('uploads' . $value) }}">
            													
            													<div class="img-border" style="width:100%; max-width: 200px;height: 200px; background:url({{ asset('uploads' . $value) }}) no-repeat scroll center center /cover;"></div>

            													{{--<img class="img-responsive img-border" src="{{ asset('uploads' . $value) }}" alt="">--}}
            												</a>
            											</li>

            										@endforeach

            										
            									</ul>
            								</div>
            								@endif
            								
            								@if(isset($cases_meta['fa_multi_files']))
            								<div class="other_file_list multiple_other_files_fa">
            									<h4 class="title">
            										Attachment Files
            									</h4>
            									<ul class="clearfix list-style-none">
            										
            										@foreach( $cases_meta['fa_multi_files'] as $value )
            											
            											<li><a href="{{ asset('uploads' . $value) }}"><i class="fa fa-file-o"></i></a></li>

            										@endforeach

            										
            									</ul>
            								</div>
            								@endif

            								@if( isset($cases_meta['fa_sing_image']) )
            								<div class="image_file_list single_image_files_fa">
            									<ul class="clearfix list-style-none row">
            										
            										@foreach( $cases_meta['fa_sing_image'] as $value )
            											
            											<li class="col-sm-4">
            												<a href="{{ asset('uploads' . $value) }}">
            													<div class="img-border" style="width:100%;max-width: 200px;height: 200px; background:url({{ asset('uploads' . $value) }}) no-repeat scroll center center /cover;"></div>

            													{{--<img class="img-responsive img-border" src="{{ asset('uploads' . $value) }}" alt="">--}}
            												</a>
            											</li>

            										@endforeach

            										
            									</ul>
            								</div>
            								@endif

            								@if( isset($cases_meta['fa_sing_files']) )
            								<div class="other_file_list single_other_files_fa">

            									<h4 class="title">
            										Attachment Files
            									</h4>
            									<ul class="clearfix list-style-none">
            										
            										@foreach( $cases_meta['fa_sing_files'] as $value )
            											
            											<li><a href="{{ asset('uploads' . $value) }}"><i class="fa fa-file-o"></i></a></li>

            										@endforeach

            										
            									</ul>
            								</div>
            								@endif


            							</div>
            							<!-- /.box-body -->

            							<div class="box-footer clearfix">

            							</div>
            						</div>
            			          	<!-- /.box -->
		                		</div>
		                	</div>

		              	</div>
		              	<!-- /.tab-pane -->

						{{-- <pre>
			              	{{ print_r($cases_meta) }}
						</pre> --}}

		              	<div class="tab-pane" id="tab_3">
		               		<div class="row">
		               			<div class="col-xs-12">
           							<!-- Additional case information by Helpdesk team -->
           				            <div class="box">
           				            	<div class="box-header">
           				            		<h3>Additional case information by Helpdesk</h3>
           				            		<div class="pull-left">
           				            			<!-- <a id="add-button" title="Add New" class="btn btn-success" href=""><i class="fa fa-plus-circle"></i> Add New</a> -->
           				            		</div>
           				            		<div class="pull-right">
           				            			
           				            		</div>
           				            	</div>
           				            	<!-- /.box-header -->


           				            	<div class="box-body table-responsive">


           				            		<div id="hd_show_case_info" class="hd_show_case_info" data-counthd="0">

           				            			<div class="single_hd_show_case_info">
           											
           											<div class="case_info_hd_all">
           												<h4 class="m_bottom_15">Ticket info</h4>

       													@if( isset($cases_meta['case_info_hd']) && !empty($cases_meta['case_info_hd']) )
       														@foreach( $cases_meta['case_info_hd'] as $cases_meta_value )
       															<div class="row">

           															<div class="col-xs-12">
           																<h4><b>{{ $cases_meta_value['user_name'] or '' }}</b></h4>
           																<p>Date: {{ $cases_meta_value['created_at'] or '' }}</p>
           															</div>
           															<br>

           															<div class="col-sm-12">
           																@if( isset($cases_meta_value['data']['text']) && !empty($cases_meta_value['data']['text']) )
																			@foreach($cases_meta_value['data']['text'] as $text)
																				<p>{{ $text }}</p>
																			@endforeach
																		@endif
           																
           															</div>
           															<div class="col-sm-12">

																		@if( isset($cases_meta_value['data']['images']) )
	           																<div class="case_info_hd_all_images">
	           																	<h4 class="m_bottom_15">Images</h4>
	           																	
           																		<ul class="list-style-none image_list clearfix">

           																			@foreach( $cases_meta_value['data']['images'] as $images )

           																				<li>
           																					<a href="{{ $images }}">
           																						<div class="img-border" style="width: 120px;height: 120px; background:url({{ $images }}) no-repeat scroll center center /cover;"></div>
           																						{{-- <img class="img-responsive" src="" alt=""> --}}
           																					</a>
           																				</li>	           																			
           																			@endforeach

           																		</ul>
	           																	
	           																</div>
           																@endif

           															
																		@if( isset($cases_meta_value['data']['files']) )
	           																<div class="case_info_hd_all_files">
	           																	<h4 class="m_bottom_15">Attachment</h4>

           																		<ul class="list-style-none attachment_list clearfix">

           																			@foreach( $cases_meta_value['data']['files'] as $files )

           																				<li><a class="attachment_icon" href="{{ $files }}"><i class="fa fa-file-o"></i></a></li>
           																				

           																			@endforeach

           																		</ul>		           									
	           																</div>
           																@endif

           															</div>
																
																</div>

       															<hr>

       														@endforeach
       													@endif
           												

           											</div>


           											

           											<hr>
           				            				
           				            			</div>

           				            		</div>


           				            		@php

           				            			if(isset($cases_meta['case_info_hd_count']) && !empty($cases_meta['case_info_hd_count'])){
           				            				//$hd_data_counts = count($cases_meta['case_info_hd'], COUNT_RECURSIVE);

           				            				$hd_data_count = $cases_meta['case_info_hd_count'];
           				            			}
           				            			else{
           				            				$hd_data_count = 0;
           				            			}

           				            		@endphp

           									
           									@if( check_user_permissions(request(), 'CaseIncedent@CaseInfoUpdateHd') )
           									<!-- Button trigger modal -->
           									<div id="hd_add_case_info" class="hd_add_case_info m_top_30" data-count_hd="{{ $hd_data_count }}">
           				            			<button type="button" id="hd_add_case_info_button" class="btn btn-primary" data-toggle="modal" data-target="#hd_add_case_info_content">Add Case information</button>
           				            		</div>


           				            		<!-- Modal -->
           				            		<div class="modal fade" id="hd_add_case_info_content" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
           				            		  	<div class="modal-dialog" role="document">
           					            		    <div class="modal-content">

           					            		    	<!-- Content Form -->
           					            		    	{!! Form::model($cases, [
           					            		    	  'method' => 'POST',
           					            		    	  'route'  => ['backend.case.updatehd', $cases->id],
           					            		    	  'files'  => TRUE,
           					            		    	  'id' => 'post-form'
           					            		    	]) !!}

           						            		      	<div class="modal-header">
           							            		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           							            		        <h4 class="modal-title" id="myModalLabel">Add Case information</h4>
           							            		    </div>
           							            		    <div class="modal-body">


           														<div class="box_body_section form-group {{ $errors->has('case_info_hd') ? 'has-error' : '' }}">
           															{!! Form::label('Case Info') !!}
           															{!! Form::textarea('case_info_hd[hd_content_text-'. $hd_data_count .'][text_content]', null, ['class' => 'form-control']) !!}

           															@if($errors->has('case_info_hd'))
           															    <span class="help-block">{{ $errors->first('case_info_hd') }}</span>
           															@endif
           														</div>

           														<div class="box_body_section form-group {{ $errors->has('name') ? 'has-error' : '' }}">
           															{{--@if( isset($cases_meta["upload_image_1"]) )
           																<p><img class="img-responsive" src="{{ asset('uploads') }}{{ $cases_meta["upload_image_1"] }}" alt=""></p>
           															@endif--}}
           															{!! Form::label('Upload Files Additional') !!}
           															<p class="hd_multi_files">
           																{!! Form::file('case_info_hd[hd_content_files-'. $hd_data_count .'][file-1]', ["class" => "form-controll"]) !!}
           															</p>
           															@if($errors->has('name'))
           															    <span class="help-block">{{ $errors->first('name') }}</span>
           															@endif
           															
           					
           															<p class="m_top_15">
           																<button id="add_more_files_btn" type="button" class="btn btn-primary">Add More</button>
           															</p>
           														</div>


           														


           													
           							            		    
           							            		    </div>
           							            		    <div class="modal-footer clearfix">
           							            		        <button type="button" class="btn btn-default f_left" data-dismiss="modal">Close</button>
           							            		        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
           							            		        {!! Form::submit('Save Data', ['class' => 'btn btn-primary', 'name' => 'save']) !!}
           						            		      	</div>

           												
           												{!! Form::close() !!}
           												<!-- Content Form End -->


           					            		    </div> <!-- .modal-content -->
           				            		  	</div>
           				            		</div> <!-- modal end -->
           				            		@endif


           				            	</div>
           				            	<!-- /.box-body -->

           				            	<div class="box-footer clearfix">

           				            	</div>
           				            </div>
           				            <!-- /.box -->
		               			</div>
								
								<!-- submit for review -->
		               			<div class="col-xs-12">
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
											
											@if( check_user_permissions(request(), 'CaseIncedent@CaseInfoUpdateHd') )
		               						<div class="box_body_section form-group">
		               							{{-- {!! Form::submit('Mark as Open Case', ['class' => 'btn btn-success btn-lg pull-right']) !!} --}}

		               							{!! Form::open(['method' => 'POST', 'route' => ['backend.case.change.status', $cases->id], 'class' => 'd_block']) !!}

		               									<button type="submit" name="case_status_action" value="archive" class="btn btn-default pull-left">Archive Case</button>

	               									    <button type="submit" name="case_status_action" value="open" class="btn btn-success btn-lg pull-right">Mark as Open Case</button>
		               							   


		               							{!! Form::close() !!}
		               						</div>
		               						@endif


		               					</div>
		               					<!-- /.box-body -->
		               					<div class="box-footer clearfix">

		               					</div>
		               				</div>
		               			</div>

		               		</div>
		              	</div>
		              	<!-- /.tab-pane -->

						
						<!-- // FF Team -->
		              	<div class="tab-pane" id="tab_4">
		               		<div class="row">
		               			<div class="col-xs-12">
           							<!-- Additional case information by Fact Finding Team -->
           				            <div class="box">
           				            	<div class="box-header">
           				            		<h3>Additional Ticket  information by Engineer</h3>
           				            		<div class="pull-left">
           				            			<!-- <a id="add-button" title="Add New" class="btn btn-success" href="#"><i class="fa fa-plus-circle"></i> Add New</a> -->
           				            		</div>
           				            		<div class="pull-right">
           				            			
           				            		</div>
           				            	</div>
           				            	<!-- /.box-header -->


           				            	<div class="box-body table-responsive">

           				            		<!-- // Case Info by FF -->

           				            		<div id="ff_show_case_info" class="ff_show_case_info" data-countadmin="0">

           				            			<div class="single_ff_show_case_info">
           											
           											<div class="case_info_ff_all">
           												<h4 class="m_bottom_15">Ticket info by Engineer</h4>
           												
           												@if( isset($cases_meta['case_info_ff']) && !empty($cases_meta['case_info_ff']) )
       														@foreach( $cases_meta['case_info_ff'] as $cases_meta_value )
       															<div class="row">

           															<div class="col-xs-12">
           																<h4><b>{{ $cases_meta_value['user_name'] or '' }}</b></h4>
           																<p>Date: {{ $cases_meta_value['created_at'] or '' }}</p>
           															</div>
           															<br>

           															<div class="col-sm-12">
           																@if( isset($cases_meta_value['data']['text']) && !empty($cases_meta_value['data']['text']) )
																			@foreach($cases_meta_value['data']['text'] as $text)
																				<p>{{ $text }}</p>
																			@endforeach
																		@endif
           																
           															</div>
           															<div class="col-sm-12">

																		@if( isset($cases_meta_value['data']['images']) )
	           																<div class="case_info_hd_all_images">
	           																	<h4 class="m_bottom_15">Images</h4>
	           																	
           																		<ul class="list-style-none image_list clearfix">

           																			@foreach( $cases_meta_value['data']['images'] as $images )

           																				<li>
           																					<a href="{{ $images }}">
           																						<div class="img-border" style="width: 120px;height: 120px; background:url({{ $images }}) no-repeat scroll center center /cover;"></div>
           																						{{-- <img class="img-responsive" src="" alt=""> --}}
           																					</a>
           																				</li>	           																			
           																			@endforeach

           																		</ul>
	           																	
	           																</div>
           																@endif

           															
																		@if( isset($cases_meta_value['data']['files']) )
	           																<div class="case_info_hd_all_files">
	           																	<h4 class="m_bottom_15">Attachment</h4>

           																		<ul class="list-style-none attachment_list clearfix">

           																			@foreach( $cases_meta_value['data']['files'] as $files )

           																				<li><a class="attachment_icon" href="{{ $files }}"><i class="fa fa-file-o"></i></a></li>
           																				

           																			@endforeach

           																		</ul>		           									
	           																</div>
           																@endif

           															</div>
																
																</div>

       															<hr>

       														@endforeach
       													@endif

           											</div>


           											<hr>
           				            				
           				            			</div>

           				            		</div>



           				            		@php

           				            			if(isset($cases_meta['case_info_ff_count']) && !empty($cases_meta['case_info_ff_count'])){
           				            				//$ff_data_counts = count($cases_meta['case_info_ff'], COUNT_RECURSIVE);

           				            				$ff_data_count = $cases_meta['case_info_ff_count'];
           				            			}
           				            			else{
           				            				$ff_data_count = 0;
           				            			}

           				            		@endphp

           									
           									@if( check_user_permissions(request(), 'CaseIncedent@CaseInfoUpdateFF') )
           									<!-- Button trigger modal -->
           									<div id="ff_add_case_info" class="ff_add_case_info m_top_30" data-count_hd="{{ $ff_data_count }}">
           				            			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ff_add_case_info_content">Add Case information</button>
           				            		</div>


           				            		<!-- Modal -->
           				            		<div class="modal fade" id="ff_add_case_info_content" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
           				            		  	<div class="modal-dialog" role="document">
           					            		    <div class="modal-content">

           					            		    	<!-- Content Form -->
           					            		    	{!! Form::model($cases, [
           					            		    	  'method' => 'POST',
           					            		    	  'route'  => ['backend.case.updateff', $cases->id],
           					            		    	  'files'  => TRUE,
           					            		    	  'id' => 'post-form-ff'
           					            		    	]) !!}

           						            		      	<div class="modal-header">
           							            		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           							            		        <h4 class="modal-title" id="myModalLabel">Add Case information</h4>
           							            		    </div>
           							            		    <div class="modal-body">


           														<div class="box_body_section form-group {{ $errors->has('case_info_ff') ? 'has-error' : '' }}">
           															{!! Form::label('Case Info') !!}
           															{!! Form::textarea('case_info_ff[ff_content_text-'. $ff_data_count .'][text_content]', null, ['class' => 'form-control']) !!}

           															@if($errors->has('case_info_ff'))
           															    <span class="help-block">{{ $errors->first('case_info_ff') }}</span>
           															@endif
           														</div>

           														<div class="box_body_section form-group {{ $errors->has('name') ? 'has-error' : '' }}">
           															{{--@if( isset($cases_meta["upload_image_1"]) )
           																<p><img class="img-responsive" src="{{ asset('uploads') }}{{ $cases_meta["upload_image_1"] }}" alt=""></p>
           															@endif--}}
           															{!! Form::label('Upload Files Additional') !!}
           															<p class="ff_multi_files">
           																{!! Form::file('case_info_ff[ff_content_files-'. $ff_data_count .'][file-1]', ["class" => "form-controll m_bottom_5"]) !!}
           															</p>
           															@if($errors->has('name'))
           															    <span class="help-block">{{ $errors->first('name') }}</span>
           															@endif
           															
           					
           															<p class="m_top_15">
           																<button id="add_more_files_btn_ff" type="button" class="btn btn-primary">Add More</button>
           															</p>
           														</div>


           														


           													
           							            		    
           							            		    </div>
           							            		    <div class="modal-footer clearfix">
           							            		        <button type="button" class="btn btn-default f_left" data-dismiss="modal">Close</button>
           							            		        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
           							            		        {!! Form::submit('Save Data', ['class' => 'btn btn-primary', 'name' => 'save']) !!}
           						            		      	</div>

           												
           												{!! Form::close() !!}
           												<!-- Content Form End -->


           					            		    </div> <!-- .modal-content -->
           				            		  	</div>
           				            		</div> <!-- modal end -->
           				            		@endif

           				            	</div>
           				            	<!-- /.box-body -->

           				            	<div class="box-footer clearfix">

           				            	</div>
           				            </div>
           				            <!-- /.box -->
		               			</div>
								
								<!-- submit for review -->
		               			<div class="col-xs-12">
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
											
											@if( check_user_permissions(request(), 'CaseIncedent@CaseInfoUpdateFF') )
		               						<div class="box_body_section form-group">
		               							{!! Form::open(['method' => 'POST', 'route' => ['backend.case.change.status', $cases->id], 'class' => 'd_block']) !!}

		               									<button type="submit" name="case_status_action" value="archive" class="btn btn-default pull-left">Archive Case</button>

	               									    <button type="submit" name="case_status_action" value="open" class="btn btn-success btn-lg pull-right">Mark as Open Case</button>
		               							   
		               							{!! Form::close() !!}
		               						</div>
		               						@endif


		               					</div>
		               					<!-- /.box-body -->
		               					<div class="box-footer clearfix">

		               					</div>
		               				</div>
		               			</div>


		               		</div>
		              	</div>
		              	<!-- /.tab-pane -->
						
						<!-- Admin Team -->
		              	<div class="tab-pane" id="tab_5">
		               		<div class="row">
		               			<div class="col-xs-12">
           							<!-- Additional case information by Admin -->
           				            <div class="box">
           				            	<div class="box-header">
           				            		<h3>Additional Ticket information by Manager</h3>
           				            		<div class="pull-left">
           				            			<!-- <a id="add-button" title="Add New" class="btn btn-success" href=""><i class="fa fa-plus-circle"></i> Add New</a> -->
           				            		</div>
           				            		<div class="pull-right">
           				            			
           				            		</div>
           				            	</div>
           				            	<!-- /.box-header -->


           				            	<div class="box-body table-responsive">

           				            		<!-- // Case Info by admin -->

           				            		<div id="admin_show_case_info" class="admin_show_case_info" data-countadmin="0">

           				            			<div class="single_admin_show_case_info">
           											
           											<div class="case_info_admin_all">
           												<h4 class="m_bottom_15">Ticket info by Manager</h4>
           												
           												@if( isset($cases_meta['case_info_admin']) && !empty($cases_meta['case_info_admin']) )
       														@foreach( $cases_meta['case_info_admin'] as $cases_meta_value )
       															<div class="row">

           															<div class="col-xs-12">
           																<h4><b>{{ $cases_meta_value['user_name'] or '' }}</b></h4>
           																<p>Date: {{ $cases_meta_value['created_at'] or '' }}</p>
           															</div>
           															<br>

           															<div class="col-sm-12">
           																@if( isset($cases_meta_value['data']['text']) && !empty($cases_meta_value['data']['text']) )
																			@foreach($cases_meta_value['data']['text'] as $text)
																				<p>{{ $text }}</p>
																			@endforeach
																		@endif
           																
           															</div>
           															<div class="col-sm-12">

																		@if( isset($cases_meta_value['data']['images']) )
	           																<div class="case_info_hd_all_images">
	           																	<h4 class="m_bottom_15">Images</h4>
	           																	
           																		<ul class="list-style-none image_list clearfix">

           																			@foreach( $cases_meta_value['data']['images'] as $images )

           																				<li>
           																					<a href="{{ $images }}">
           																						<div class="img-border" style="width: 120px;height: 120px; background:url({{ $images }}) no-repeat scroll center center /cover;"></div>
           																						{{-- <img class="img-responsive" src="" alt=""> --}}
           																					</a>
           																				</li>	           																			
           																			@endforeach

           																		</ul>
	           																	
	           																</div>
           																@endif

           															
																		@if( isset($cases_meta_value['data']['files']) )
	           																<div class="case_info_hd_all_files">
	           																	<h4 class="m_bottom_15">Attachment</h4>

           																		<ul class="list-style-none attachment_list clearfix">

           																			@foreach( $cases_meta_value['data']['files'] as $files )

           																				<li><a class="attachment_icon" href="{{ $files }}"><i class="fa fa-file-o"></i></a></li>
           																				

           																			@endforeach

           																		</ul>		           									
	           																</div>
           																@endif

           															</div>
																
																</div>

       															<hr>

       														@endforeach
       													@endif

           											</div>

           											<hr>
           				            				
           				            			</div>

           				            		</div>



           				            		@php

           				            			if(isset($cases_meta['case_info_admin_count']) && !empty($cases_meta['case_info_admin_count'])){
           				            				
           				            				$admin_data_count = $cases_meta['case_info_admin_count'];
           				            			}
           				            			else{
           				            				$admin_data_count = 0;
           				            			}

           				            		@endphp

           									@if( check_user_permissions(request(), 'CaseIncedent@CaseInfoUpdateAdmin') )
           									<!-- Button trigger modal -->
           									<div id="admin_add_case_info" class="admin_add_case_info m_top_30" data-count_hd="{{ $admin_data_count }}">
           				            			<button type="button" id="hd_add_case_info_button" class="btn btn-primary" data-toggle="modal" data-target="#admin_add_case_info_content">Add Case information</button>
           				            		</div>


           				            		<!-- Modal -->
           				            		<div class="modal fade" id="admin_add_case_info_content" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
           				            		  	<div class="modal-dialog" role="document">
           					            		    <div class="modal-content">

           					            		    	<!-- Content Form -->
           					            		    	{!! Form::model($cases, [
           					            		    	  'method' => 'POST',
           					            		    	  'route'  => ['backend.case.updateadmin', $cases->id],
           					            		    	  'files'  => TRUE,
           					            		    	  'id' => 'post-form-admin'
           					            		    	]) !!}

           						            		      	<div class="modal-header">
           							            		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           							            		        <h4 class="modal-title" id="myModalLabel">Add Case information</h4>
           							            		    </div>
           							            		    <div class="modal-body">


           														<div class="box_body_section form-group {{ $errors->has('case_info_admin') ? 'has-error' : '' }}">
           															{!! Form::label('Case Info') !!}
           															{!! Form::textarea('case_info_admin[admin_content_text-'. $admin_data_count .'][text_content]', null, ['class' => 'form-control']) !!}

           															@if($errors->has('case_info_admin'))
           															    <span class="help-block">{{ $errors->first('case_info_admin') }}</span>
           															@endif
           														</div>

           														<div class="box_body_section form-group {{ $errors->has('name') ? 'has-error' : '' }}">
           															{{--@if( isset($cases_meta["upload_image_1"]) )
           																<p><img class="img-responsive" src="{{ asset('uploads') }}{{ $cases_meta["upload_image_1"] }}" alt=""></p>
           															@endif--}}
           															{!! Form::label('Upload Files Additional') !!}
           															<p class="admin_multi_files">
           																{!! Form::file('case_info_admin[admin_content_files-'. $admin_data_count .'][file-1]', ["class" => "form-controll m_bottom_10"]) !!}
           															</p>
           															@if($errors->has('name'))
           															    <span class="help-block">{{ $errors->first('name') }}</span>
           															@endif
           															
           					
           															<p class="m_top_15">
           																<button id="add_more_files_btn_admin" type="button" class="btn btn-primary">Add More</button>
           															</p>
           														</div>


           														


           													
           							            		    
           							            		    </div>
           							            		    <div class="modal-footer clearfix">
           							            		        <button type="button" class="btn btn-default f_left" data-dismiss="modal">Close</button>
           							            		        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
           							            		        {!! Form::submit('Save Data', ['class' => 'btn btn-primary', 'name' => 'save']) !!}
           						            		      	</div>

           												
           												{!! Form::close() !!}
           												<!-- Content Form End -->


           					            		    </div> <!-- .modal-content -->
           				            		  	</div>
           				            		</div> <!-- modal end -->
           				            		@endif

           				            	</div>
           				            	<!-- /.box-body -->

           				            	<div class="box-footer clearfix">

           				            	</div>
           				            </div>
           				            <!-- /.box -->
		               			</div>
								
								<!-- approve case -->
		               			<div class="col-xs-12">
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
											
											@if( check_user_permissions(request(), 'CaseIncedent@CaseChangeStatusAdmin') )
		               						<div class="box_body_section form-group">
		               							{!! Form::open(['method' => 'POST', 'route' => ['backend.case.change.statusadmin', $cases->id], 'class' => 'd_block']) !!}

		               									<button type="submit" name="case_status_action" value="archive" class="btn btn-default pull-left">Archive Case</button>

	               									    <button type="submit" name="case_status_action" value="approve" class="btn btn-success btn-lg pull-right">Approve Case</button>

	               									    <button type="submit" name="case_status_action" value="open" class="btn btn-success btn-lg pull-right m_right_15">Mark as Open Case</button>
		               							   
		               							{!! Form::close() !!}
		               						</div>
		               						@endif


		               					</div>
		               					<!-- /.box-body -->
		               					<div class="box-footer clearfix">

		               					</div>
		               				</div>
		               			</div>
		               		</div>
		              	</div>
		              	<!-- /.tab-pane -->
						
						<div class="tab-pane" id="tab_6">
							
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">

									<div class="box">
										<div class="box-header">
											<div class="pull-left">
												<h3>All Message from this Case</h3>
											</div>
											<div class="pull-right">
												
											</div>
										</div>
										<!-- /.box-header -->
										

										<div class="box-body table-responsive">

											<div class="box_body_section form-group">
												
												<div id="box-comments" class="box-footer box-comments">

													@foreach($case_comments['data'] as $case_comment)
													
										              <div class="box-comment">
										              	{{-- $case_comment['id'] --}}
										                <!-- User image -->
										                <img class="img-circle img-sm" src="{{ $case_comment['user']['profile_pic'] or '/images/avater.png' }}" alt="User Image">

										                <div class="comment-text">
										                      <span class="username">
										                        {{ $case_comment['user']['name'] or '' }}
										                        <span class="text-muted pull-right">{{ date('d-m-Y  h:i A', strtotime($case_comment['created_at'])) }}</span>
										                      </span><!-- /.username -->
										                  {{ $case_comment['comment_content'] }}
										                </div>
										                <!-- /.comment-text -->
										              </div>

													@endforeach


										        </div>

											</div>


										</div>
										<!-- /.box-body -->
										<div class="box-footer clearfix">
											
											@if( $case_comments['last_page'] > 1 )

											<ul id="messagebox_pagination" class="pagination">
											
												<!-- Prev page -->
												@if( isset($case_comments['prev_page_url']) &&  $case_comments['prev_page_url'] != null )
													<li><a href="{{ $case_comments['prev_page_url'] }}" rel="prev">«</a></li>
												@else
													<li class="disabled"><span>«</span></li>
												@endif
												@for( $i= 1; $i <= $case_comments['last_page']; $i++ )

													@if( $i == $case_comments['current_page'] )
														<li class="active"><span>{{ $i }}</span></li>
													@else
														<li><a href="{{ $case_comments['path'] }}?page={{ $i }}">{{ $i }}</a></li>
													@endif

												@endfor
												<!-- Next page -->
												@if( isset($case_comments['next_page_url']) &&  $case_comments['next_page_url'] != null )
													<li><a href="{{ $case_comments['next_page_url'] }}" rel="next">»</a></li>
												@else
													<li class="disabled"><span>»</span></li>
												@endif

											</ul>
											@endif

											{{-- $case_comments->links() --}}
										</div>
									</div>


									<div class="box">
										<div class="box-header">
											<div class="pull-left">
												<h3>Create New Message</h3>
											</div>
											<div class="pull-right">
												
											</div>
										</div>
										<!-- /.box-header -->


										<div class="box-body table-responsive">

											<div class="box_body_section form-group">
												
												<p class="alert alert-warning alert-dismissible d_none"></p>
												{{ csrf_field() }}
								              	<textarea name="message_box" id="message_box" cols="90" rows="10" style="width:100%;margin-bottom: 20px;"></textarea>
								              	<button id="message_create_button" class="btn btn-primary">Create message</button>

											</div>


										</div>
										<!-- /.box-body -->
										<div class="box-footer clearfix">

										</div>
									</div>
									<!-- .box -->
								</div>

								

							</div>

						</div> <!-- .tab-pane -->


		            </div>
		            <!-- /.tab-content -->

		            

		        </div> <!-- .nav-tabs-custom -->
				 
			</div> 

		</div> <!-- .row -->



      	<div class="row">

        	<div class="col-xs-7">
			
				
        	</div>  <!-- .col-xs-7 -->

        	<div class="col-xs-5">
			
        	</div> <!-- .col-xs-5 -->


      	</div>
    	<!-- ./row -->

		<div class="row">
			<div class="footer_section">
				<div class="col-xs-12">
					
					<div class="box">

						<div class="box-footer clearfix">
							<a href="{{ route('backend.case.index') }}"><i class="fa fa-angle-left fa-lg"></i>&nbsp; Back to list</a>
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

@endsection



@section('script')

<script type="text/javascript">
	
	jQuery(document).ready(function($){

		// Hd add more files
		$('#add_more_files_btn').click(function(e){
			e.preventDefault();

			var input_number =  $('#hd_add_case_info_content').find('.hd_multi_files').children('input').length;

			//console.log(input_number);

			$('#hd_add_case_info_content').find('.hd_multi_files').append('<input class="form-controll" name="case_info_hd[hd_content_files-'+ <?php echo $hd_data_count; ?> +'][file-'+ (input_number+1) +']" type="file">');
		});

		// Admin add more files
		$('#add_more_files_btn_admin').click(function(e){
			e.preventDefault();

			var input_number =  $('#admin_add_case_info_content').find('.admin_multi_files').children('input').length;

			//console.log(input_number);

			$('#admin_add_case_info_content').find('.admin_multi_files').append('<input class="form-controll m_bottom_10" name="case_info_admin[admin_content_files-'+ <?php echo $admin_data_count; ?> +'][file-'+ (input_number+1) +']" type="file">');
		});

		// FF add more files
		$('#add_more_files_btn_ff').click(function(e){
			e.preventDefault();

			var input_number =  $('#ff_add_case_info_content').find('.ff_multi_files').children('input').length;

			//console.log(input_number);

			$('#ff_add_case_info_content').find('.ff_multi_files').append('<input class="form-controll m_bottom_10" name="case_info_ff[ff_content_files-'+ <?php echo $ff_data_count; ?> +'][file-'+ (input_number+1) +']" type="file">');
		});


	


		// Message Create
		$('#message_create_button').on('click', function(e){

			e.preventDefault();
			var messageBox = $('#message_box').val();
			var _token = $('#message_box').siblings('input[name="_token"]').val();

			if( messageBox !== '' ){
				
				$.ajax({
				    //url: "['case.message.create', $cases->id]",
				    url: "{{ URL::route('backend.case.message.create', $cases->id) }}",
				    type: "POST",
				    accept: "application/json",
				    //data: JSON.stringify(params),
				    //data: params,
				    data: {_token:_token, message:messageBox},
				    dataType: "json",
				    //async: false,
				    success: function (response) {
				        //console.log('success');
				        
				        var html = '';

				        html += '<div class="box-comment"><img class="img-circle img-sm" src="' + response.profile_pic + '" alt="User Image"><div class="comment-text"><span class="username">' + response.user_name + '<span class="text-muted pull-right">' + response.created_at + '</span></span>' + response.comment + '</div></div>';
				        

				        var first_child = $('#messagebox_pagination').children('li:nth-of-type(2)');

				        if( $('#messagebox_pagination').length ){
				        	if( first_child.hasClass('active') === true ){
				        		$('#box-comments').append(html);
				        	}
				        	else{

				        		var url = $(first_child).children('a').attr('href');

				        		var url_added = url + '#messagebox_pagination';

				        		$(first_child).children('a').attr('href', url_added);

				        		$(first_child).children('a')[0].click();


				        	}
				        }
				        else{
				        	$('#box-comments').append(html);
				        }

				        

				        $('#message_box').val("");

				    },
				    error: function (response) {
				        //alert("Please check password and confirm password. Password must be 4 characters long or more!");
				    }
				    //processData: false

				});

			}
			else{
				$(this).siblings('.alert').text('Message box is empty').removeClass('d_none');
			}

		});



		//save tab active
		$('#case_details_tab_list a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

		  //console.log(e.target); // newly activated tab
		  //e.relatedTarget // previous active tab

		  var liIndex = $('#case_details_tab_list li.active').index();

		  $(window).unload(saveSettings);

		  function saveSettings() {
		      localStorage.li_index = liIndex;
		  }

		});

		if( typeof localStorage.li_index != "undefined" ){
			$('#case_details_tab_list li:eq('+ localStorage.li_index +')').children('a')[0].click();
		}


	}); // doc ready


</script>


@endsection