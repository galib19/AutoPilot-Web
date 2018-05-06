@extends('backend.layouts.app-backend')


@section('title')

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

@endsection


@section('content')

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
              <div class="box-header">
                  <div class="pull-left">
                      <a id="add-button" title="Add New" class="btn btn-success" href="{{ route('backend.user.create') }}"><i class="fa fa-plus-circle"></i> Add New</a>
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
                    
                    @foreach($users as $user)
						
					@if( $user->active == 0 || $user->id == 1 )
						<tr style="opacity: 0.7;">
					@else
						<tr>
					@endif
					
                    
                      <td>{{ str_pad($user->id, 4, '0', STR_PAD_LEFT) }}</td>
                      <td><a href="{{ route('backend.user.show', $user->id) }}">{{ $user->name }}</a></td>
                      <td width="200">
						
						@if( isset($user->roles[0]->name) && $user->roles[0]->name == 'admin' )
							<span class="label label-danger">{{ $user->roles[0]->display_name or '' }}</span>
						@elseif( isset($user->roles[0]->name) && $user->roles[0]->name == 'manager' )
							<span class="label label-success">{{ $user->roles[0]->display_name or '' }}</span>
						@elseif( isset($user->roles[0]->name) && $user->roles[0]->name == 'engineer' )
							<span class="label label-primary">{{ $user->roles[0]->display_name or '' }}</span>
						@elseif( isset($user->roles[0]->name) && $user->roles[0]->name == 'client' )
							<span class="label label-info">{{ $user->roles[0]->display_name or '' }}</span>
						@else
							<span class="label label-info">{{ $user->roles[0]->display_name or '' }}</span>
						@endif
                      	

                      </td>
                      <td width="100"><abbr>@if( $user->active == 1 ){{ 'Yes' }} @else {{ 'No' }} @endif</abbr></td>

                      <td width="100">
                            <a title="View" class="btn btn-xs btn-default edit-row" href="{{ route('backend.user.show', $user->id) }}">
                                <i class="fa fa-eye"></i>
                            </a>
                          <a title="Edit" class="btn btn-xs btn-default edit-row" href="{{ route('backend.user.edit', $user->id) }}">
                              <i class="fa fa-edit"></i>
                          </a>
                          {{-- {!! Form::open(['method' => 'DELETE', 'route' => ['backend.user.destroy', $user->id], 'class' => 'd_inline_b']) !!}
                              
                                <button type="submit" class="btn btn-xs btn-danger" onClick="return confirm('Are you sure you want to deactivate?')">
                                    <i class="fa fa-times"></i>
                                </button>
                          {!! Form::close() !!} --}}
                      </td>
                    </tr>

                    @endforeach

                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                {!! $users->links() !!}
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

@endsection

