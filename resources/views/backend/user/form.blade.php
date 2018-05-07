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

			<div class="box_body_section form-group {{ $errors->has('name') ? 'has-error' : '' }}">
				{!! Form::label('Enter User Name *') !!}
				{!! Form::text('name', null, ['class' => 'form-control']) !!}

				@if($errors->has('name'))
				    <span class="help-block">{{ $errors->first('name') }}</span>
				@endif
			</div>

			 
			<div class="box_body_section form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
				{!! Form::label('Enter Mobile Number *') !!}
				{!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => '01800000000']) !!}

				@if($errors->has('phone'))
				    <span class="help-block">{{ $errors->first('phone') }}</span>
				@endif
			</div>


			<div class="box_body_section form-group {{ $errors->has('password') ? 'has-error' : '' }}">
				{!! Form::label('Enter Password *') !!}
				{!! Form::password('password', ['class' => 'form-control']) !!}

				@if($errors->has('password'))
				    <span class="help-block">{{ $errors->first('password') }}</span>
				@endif
			</div>


			<div class="box_body_section form-group {{ $errors->has('confirm_password') ? 'has-error' : '' }}">
				{!! Form::label('Confirm Password *') !!}
				{!! Form::password('confirm_password', ['class' => 'form-control']) !!}

				@if($errors->has('confirm_password'))
				    <span class="help-block">{{ $errors->first('confirm_password') }}</span>
				@endif
			</div>


			<div class="box_body_section form-group {{ $errors->has('email') ? 'has-error' : '' }}">
				{!! Form::label('Email') !!}
				{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'example@gmail.com']) !!}

				@if($errors->has('email'))
				    <span class="help-block">{{ $errors->first('email') }}</span>
				@endif
			</div>


			<div class="box_body_section form-group {{ $errors->has('role') ? 'has-error' : '' }}">
				{!! Form::label('Select Role *') !!}
				{!! Form::select('role', ['client' => 'Client', 'engineer' => 'Engineer', 'manager' => 'Manager'], null, ['class' => 'form-control']) !!}

				@if($errors->has('role'))
				    <span class="help-block">{{ $errors->first('role') }}</span>
				@endif
			</div>


			{{-- <div class="box_body_section form-group {{ $errors->has('name') ? 'has-error' : '' }}">
				@if( isset($user_meta["profile_pic"]) )
					<p><img class="img-responsive" src="{{ asset('uploads') }}{{ $user_meta["profile_pic"] }}" alt=""></p>
				@endif
				{!! Form::label('Upload Profile Picture') !!}
				{!! Form::file('profile_pic') !!}

				@if($errors->has('profile_pic'))
				    <span class="help-block">{{ $errors->first('profile_pic') }}</span>
				@endif
			</div> --}}


			<div class="box_body_section form-group {{ $errors->has('active') ? 'has-error' : '' }}">
				<label>
					{!! Form::hidden('active', 0) !!}
					{!! Form::checkbox( 'active', 1, true, ['class' => 'flat-red'] ) !!}
					<span>&nbsp; User Active *</span>
				</label>

				@if($errors->has('active'))
				    <span class="help-block">{{ $errors->first('active') }}</span>
				@endif
			</div>


			{{-- <div class="box_body_section form-group {{ $errors->has('user_location') ? 'has-error' : '' }}">
				{!! Form::label('Field Agent location') !!}
				{!! Form::select('user_location', $user_location, null, ['class' => 'form-control']) !!}

				@if($errors->has('user_location'))
				    <span class="help-block">{{ $errors->first('user_location') }}</span>
				@endif
			</div> --}}




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
  				{{-- Form::submit('Save Data', ['class' => 'btn btn-primary', 'name' => 'save']) --}}
  				{!! Form::submit('Save', ['class' => 'btn btn-success btn-lg pull-right']) !!}
  			</div>


  		</div>
  		<!-- /.box-body -->

  		<div class="box-footer clearfix">
  			
  		</div>
  		
  	</div> <!-- /.box -->


</div>




<div class="col-xs-12">
	


</div>




@section('script')


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


@endsection