@extends('backend.layouts.app-backend')


@section('title')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          User Details
          <!-- <small>Cases</small> -->
        </h1>
        <ol class="breadcrumb">
          <li><i class="fa fa-dashboard"></i> <a href="#">Dashboard</a></li>
          <li class="active">Cases</li>
        </ol>

    </section>

@endsection


@section('content')

    <!-- Main content -->
    <section class="content">
		
		<div class="row">
			<div class="col-xs-12">

				<div class="box box-primary">
					<div class="box-header">
						<div class="pull-left">
							<h3>User Summery</h3>
						</div>
						<div class="pull-right">
							<a href="{{ route('backend.user.edit', $user->id) }}" class="btn btn-primary edit_case m_top_15 m_bottom_15"><i class="fa fa-pencil-square-o fa-md"></i>&nbsp; Edit User</a>
						</div>
					</div>
					<!-- /.box-header -->
				</div>
	          <!-- /.box -->
			</div>
		</div>

      <div class="row">

      	<div class="col-md-6">

			

			
			<!-- About Me Box -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h2 class="box-title1">{{ $user->name }}</h2>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<strong> Designation</strong>

					<p class="text-muted">
						{{ $usermeta['designation'] or '' }}
					</p>

					<hr>

					<strong>Mobile Number</strong>

					<p class="text-muted">{{ $user->phone }}</p>

					<hr>

					<strong>Email</strong>

					<p class="text-muted">{{ $user->email }}</p>

					<hr>

					<strong>Active</strong>

					<p class="text-muted">@if($user->active) Yes @else No @endif </p>

					<hr>
					
					<strong>Field Agent Location</strong>
					<p class="text-muted">
						
						@if( isset($usermeta['user_location']) )
							{{ $all_location[$usermeta['user_location']] }}
						@endif
						
					</p>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
			

		</div>


        <div class="col-xs-6">

			<!-- Profile Image -->
			<div class="box box-primary">
				<div class="box-body box-profile">
					
					@if( isset($usermeta['profile_pic']) && !empty($usermeta['profile_pic']) )

						<div class="profile-user-img img-circle img_circle_custom" style="background:url({{ asset('uploads'.$usermeta['profile_pic']['url_thumb']) }}) no-repeat scroll center center /cover;">
							
						</div>
					@else

						<div class="profile-user-img img-circle img_circle_custom" style="background:url('/images/avater.png') no-repeat scroll center center /cover;">
							
						</div>

					@endif

					<h3 class="profile-username text-center">{{ $user->name }}</h3>

					<p class="text-muted text-center">Role: {{ $user->roles[0]->display_name or '' }}</p>

					{{-- <ul class="list-group list-group-unbordered">
						<li class="list-group-item">
							<b>Followers</b> <a class="pull-right">1,322</a>
						</li>
						<li class="list-group-item">
							<b>Following</b> <a class="pull-right">543</a>
						</li>
						<li class="list-group-item">
							<b>Friends</b> <a class="pull-right">13,287</a>
						</li>
					</ul>

					<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->

        </div>

        

        



      </div>
    <!-- ./row -->

		<div class="row">
			<div class="footer_section">
				<div class="col-xs-12">
					
					<div class="box box-primary">

						<div class="box-footer clearfix">
							<a href="{{ route('backend.user.index') }}"><i class="fa fa-angle-left fa-lg"></i>&nbsp; Back to list</a>
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

