<div class="col-xs-12">
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

			<div class="box_body_section form-group {{ $errors->has('case_title') ? 'has-error' : '' }}">
				{!! Form::label('Tower ID/Name') !!}
				{!! Form::text('case_title', null, ['class' => 'form-control']) !!}

				@if($errors->has('case_title'))
				    <span class="help-block">{{ $errors->first('case_title') }}</span>
				@endif
			</div>

			<div class="box_body_section form-group {{ $errors->has('case_details') ? 'has-error' : '' }}">
				{!! Form::label('Ticket Details') !!}
				{!! Form::textarea('case_details', null, ['class' => 'form-control']) !!}

				@if($errors->has('case_details'))
				    <span class="help-block">{{ $errors->first('case_details') }}</span>
				@endif
			</div>

			<div class="box_body_section form-group {{ $errors->has('case_type') ? 'has-error' : '' }}">
				{!! Form::label('Type of Failure') !!}
				{!! Form::select('case_type', ['Others' => 'Others', 'BCCH Missing'=>'BCCH Missing', 'Main Fails'=>'Main Fails'], null, ['class' => 'form-control']) !!}

				@if($errors->has('case_type'))
				    <span class="help-block">{{ $errors->first('case_type') }}</span>
				@endif
			</div>


			<!-- Date -->
            <div class="box_body_section form-group">
                <label>Incident Time:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input name="incident_date" type="text" class="form-control pull-right" id="datepicker" required>
                </div>
                <!-- /.input group -->
            </div>
              <!-- /.form group -->


			  {{-- <div class="box_body_section form-group {{ $errors->has('action_taken') ? 'has-error' : '' }}">
				{!! Form::label('Immediate Action Taken') !!}
				{!! Form::select('action_taken', ['1' => 'None', '2' => 'Current Off', '3' => 'Server Down'], null, ['class' => 'form-control']) !!}

				@if($errors->has('action_taken'))
				    <span class="help-block">{{ $errors->first('action_taken') }}</span>
				@endif
			</div> --}}




		</div>
		<!-- /.box-body -->
		<div class="box-footer clearfix">

		</div>
	</div>
</div>



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

			<div class="box_body_section form-group">
				{!! Form::submit('Save Data', ['class' => 'btn btn-primary', 'name' => 'save']) !!}
				{!! Form::submit('Submit For Review', ['class' => 'btn btn-success btn-lg pull-right', 'name' => 'submit']) !!}
			</div>


		</div>
		<!-- /.box-body -->
		
	</div>
</div>


