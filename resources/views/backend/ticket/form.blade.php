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

			<div class="box_body_section form-group {{ $errors->has('site_id') ? 'has-error' : '' }}">
				{!! Form::label('Site ID:') !!}
				{!! Form::text('site_id', null, ['class' => 'form-control']) !!}

				@if($errors->has('site_id'))
				    <span class="help-block">{{ $errors->first('site_id') }}</span>
				@endif
			</div>


			<div class="box_body_section form-group {{ $errors->has('ticket_type') ? 'has-error' : '' }}">
				{!! Form::label('Type of Failure') !!}
				{!! Form::select('ticket_type', ['Others' => 'Others', 'BCCH Missing'=>'BCCH Missing', 'Main Fails'=>'Main Fails'], null, ['class' => 'form-control']) !!}

				@if($errors->has('ticket_type'))
				    <span class="help-block">{{ $errors->first('ticket_type') }}</span>
				@endif
			</div>


			<!-- Date -->
            <div class="box_body_section form-group">
                <label>Raised Time:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input name="raised_time" type="text" class="form-control pull-right" id="datepicker" required>
                </div>
                <!-- /.input group -->
            </div>


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


