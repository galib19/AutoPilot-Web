@extends('backend.layouts.app-backend')


@section('title')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          All Cases
          <!-- <small></small> -->
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
          <div class="box">
              <div class="box-header">
                  <div class="pull-left">
                      <a id="add-button" title="Add New" class="btn btn-success" href="{{ route('backend.case.create') }}"><i class="fa fa-plus-circle"></i> Add New</a>
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
                      <th style="width: 80px;">Case ID</th>
                      <th>Title</th>
                      <th style="width: 180px;">Created By</th>
                      <th style="width: 100px;">Case Status</th>
                      <th style="width: 180px;">Date</th>
                      <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($cases as $case)

                    <tr>
                      <td>{{ str_pad($case->id, 4, '0', STR_PAD_LEFT) }}</td>
                      <td><a href="{{ route('backend.case.show', $case->id) }}">{{ $case->case_title }}</a></td>
                      <td>
						
						@if($case->user)
                      	{{ $case->user->name }}
						@endif
                      </td>
						
						@if( $case->case_status == 'open' )
							<td><span class="label label-warning">{{ $case->case_status }}</span></td>
						@elseif( $case->case_status == 'approve' )
							<td><span class="label label-success">{{ $case->case_status }}</span></td>
						@elseif( $case->case_status == 'archive' )
							<td><span class="label label-default">{{ $case->case_status }}</span></td>
						@else
							<td><span class="label label-info">{{ $case->case_status }}</span></td>
						@endif

                      
                      	<td><abbr title="2016/12/04 6:32:00 PM">{{ date('d-m-Y h:i A', strtotime($case->created_at)) }}</abbr></td>
                      	<td width="100">
                        	<a title="View" class="btn btn-xs btn-default edit-row" href="{{ route('backend.case.show', $case->id) }}">
                            <i class="fa fa-eye"></i>
                        	</a>
                        	@if( check_user_permissions(request(), 'CaseIncedent@edit') )
                          	<a title="Edit" class="btn btn-xs btn-default edit-row" href="{{ route('backend.case.edit', $case->id) }}">
                              <i class="fa fa-edit"></i>
                          	</a>
                          	@endif
                          	@if( check_user_permissions(request(), 'CaseIncedent@destroy') )
                          	{!! Form::open(['method' => 'DELETE', 'route' => ['backend.case.destroy', $case->id], 'class' => 'd_inline_b']) !!}
                              
                                <button type="submit" class="btn btn-xs btn-danger" onClick="return confirm('Are you sure you want to delete?')">
                                    <i class="fa fa-times"></i>
                                </button>
                          	{!! Form::close() !!}
                          	@endif
                      </td>
                    </tr>

                    @endforeach

                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                {!! $cases->links() !!}
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

