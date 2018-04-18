<div class="col-xs-7">
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
				{!! Form::label('Case Name') !!}
				{!! Form::text('case_title', null, ['class' => 'form-control']) !!}

				@if($errors->has('case_title'))
				    <span class="help-block">{{ $errors->first('case_title') }}</span>
				@endif
			</div>

			<div class="box_body_section form-group {{ $errors->has('case_details') ? 'has-error' : '' }}">
				{!! Form::label('Case Details') !!}
				{!! Form::textarea('case_details', null, ['class' => 'form-control']) !!}

				@if($errors->has('case_details'))
				    <span class="help-block">{{ $errors->first('case_details') }}</span>
				@endif
			</div>


		</div>
		<!-- /.box-body -->
		<div class="box-footer clearfix">

		</div>
	</div>
  <!-- /.box -->


	<div class="box">
		<div class="box-header">
			<h3>Field Agent Additional Information</h3>
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


		<div class="box-body ">

			<div class="box_body_section form-group {{ $errors->has('case_type') ? 'has-error' : '' }}">
				{!! Form::label('Types of Violence') !!}
				{!! Form::select('case_type', ['1' => 'Acid Violence', '2' => 'Burn Violence', '3' => 'Child marraige'], null, ['class' => 'form-control']) !!}

				@if($errors->has('case_type'))
				    <span class="help-block">{{ $errors->first('case_type') }}</span>
				@endif
			</div>


			<!-- Date -->
            <div class="box_body_section form-group">
                <label>Incident Date:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input name="incident_date" type="text" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
            </div>
              <!-- /.form group -->


			<div class="box_body_section form-group">
				<p><strong>Immediate Action Taken:</strong></p>
				{!! Form::checkbox('action_taken[]', 1, (isset($cases_meta["label_check"]) && $cases_meta["label_check"] == 1 ? true : false ) ) !!}&nbsp;
				{!! Form::label('Refer to hospital') !!}

				<br>

				{!! Form::checkbox('action_taken[]', 2, (isset($cases_meta["label_check"]) && $cases_meta["label_check"] == 2 ? true : false ) ) !!}&nbsp;
				{!! Form::label('Refer to police') !!}

				<br>

				{!! Form::checkbox('action_taken[]', 3, (isset($cases_meta["label_check"]) && $cases_meta["label_check"] == 3 ? true : false ) ) !!}&nbsp;
				{!! Form::label('Refer to other') !!}
				
			</div>




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
			<h3>Enter details of Victime</h3>
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


		<div class="box-body ">

			<div class="box_body_section form-group {{ $errors->has('name') ? 'has-error' : '' }}">
				{!! Form::label('Name') !!}
				{!! Form::text('name', null, ['class' => 'form-control']) !!}

				@if($errors->has('name'))
				    <span class="help-block">{{ $errors->first('name') }}</span>
				@endif
			</div>

			<div class="box_body_section form-group {{ $errors->has('parents') ? 'has-error' : '' }}">
				{!! Form::label('Parents/Husband') !!}
				{!! Form::text('parents', null, ['class' => 'form-control']) !!}

				@if($errors->has('parents'))
				    <span class="help-block">{{ $errors->first('parents') }}</span>
				@endif
			</div>

			<div class="box_body_section form-group {{ $errors->has('age') ? 'has-error' : '' }}">
				{!! Form::label('Age') !!}
				{!! Form::number('age', null, ['class' => 'form-control']) !!}

				@if($errors->has('age'))
				    <span class="help-block">{{ $errors->first('age') }}</span>
				@endif
			</div>

			<div class="box_body_section form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
				{!! Form::label('Sex') !!}
				{!! Form::select('sex', ['man' => 'Man', 'woman' => 'Woman', 'girl' => 'Girl', 'boys' => 'Boys', 'others' => 'Others'], null, ['class' => 'form-control']) !!}

				@if($errors->has('gender'))
				    <span class="help-block">{{ $errors->first('gender') }}</span>
				@endif
			</div>


			<div class="box_body_section form-group {{ $errors->has('location') ? 'has-error' : '' }}">
				{!! Form::label('Location Information') !!}
				{!! Form::text('location', null, ['class' => 'form-control']) !!}

				@if($errors->has('location'))
				    <span class="help-block">{{ $errors->first('location') }}</span>
				@endif
			</div>

			


		</div>
		<!-- /.box-body -->
		<div class="box-footer clearfix">

		</div>
	</div>
  	<!-- /.box -->

	<div class="box">
		<div class="box-header">
			<h3>Additinal Case Information</h3>
			<div class="pull-left">
				<!-- <a id="add-button" title="Add New" class="btn btn-success" href="{{ route('backend.case.create') }}"><i class="fa fa-plus-circle"></i> Add New</a> -->
			</div>
			<div class="pull-right">
				
			</div>
		</div>
		<!-- /.box-header -->


		<div class="box-body table-responsive">
	
			{{-- dd($cases_meta) --}}
		 	
		 	<div class="box_body_section form-group">
		 		{!! Form::label('Additional Checkbox') !!}
		 		{!! Form::hidden('casefieldextra[label_check]', 0) !!}
		 		{!! Form::checkbox('casefieldextra[label_check]', 1, (isset($cases_meta["label_check"]) && $cases_meta["label_check"] == 1 ? true : false ) ) !!}
		 		@if($errors->has('location'))
		 		    <span class="help-block">{{ $errors->first('location') }}</span>
		 		@endif
		 	</div>


		 	<div class="box_body_section form-group {{ $errors->has('name') ? 'has-error' : '' }}">
		 		{!! Form::label('Additional name') !!}
		 		{!! Form::text('casefieldextra[name_extra]', (isset($cases_meta["name_extra"]) ? $cases_meta["name_extra"] : null ), ['class' => 'form-control']) !!}

		 		@if($errors->has('name'))
		 		    <span class="help-block">{{ $errors->first('name') }}</span>
		 		@endif
		 	</div>


		 	<div class="box_body_section form-group {{ $errors->has('name') ? 'has-error' : '' }}">
		 		{!! Form::label('Location name Additional') !!}
		 		{!! Form::text('casefieldextra[loacation_extra]', (isset($cases_meta["name_extra"]) ? $cases_meta["loacation_extra"] : null ), ['class' => 'form-control']) !!}

		 		@if($errors->has('name'))
		 		    <span class="help-block">{{ $errors->first('name') }}</span>
		 		@endif
		 	</div>



		 	<div class="box_body_section form-group {{ $errors->has('name') ? 'has-error' : '' }}">
		 		@if( isset($cases_meta["upload_image_1"]) )
		 			<p><img class="img-responsive" src="{{ asset('uploads') }}{{ $cases_meta["upload_image_1"] }}" alt=""></p>
		 		@endif
		 		{!! Form::label('Upload Files Additional') !!}
		 		{!! Form::file('casefieldextra[upload_image_1]') !!}

		 		@if($errors->has('name'))
		 		    <span class="help-block">{{ $errors->first('name') }}</span>
		 		@endif
		 	</div>

		 	<div class="box_body_section form-group {{ $errors->has('name') ? 'has-error' : '' }}">
		 		@if( isset($cases_meta["upload_image_2"]) )
					<p><img class="img-responsive" src="{{ asset('uploads') }}{{ $cases_meta["upload_image_2"] }}" alt=""></p>
				@endif
		 		{!! Form::label('Upload Files two Additional') !!}
		 		{!! Form::file('casefieldextra[upload_image_2]') !!}

		 		@if($errors->has('name'))
		 		    <span class="help-block">{{ $errors->first('name') }}</span>
		 		@endif
		 	</div>

		 	<div class="box_body_section form-group">
		 		<h4>Multiple image upload</h4>
		 		<p>
		 			<input type="file" name="casefieldextramultiple[]" multiple>
		 		</p>
		 	</div>


		</div>
		<!-- /.box-body -->

		<div class="box-footer clearfix">

		</div>
	</div>
	<!-- /.box -->


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


