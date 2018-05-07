@extends('backend.layouts.app-backend')


@section('title')

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

@endsection


@section('content')

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
                      <th>Tower Name/ID  - Problem</th>
                      <th style="width: 180px;">Created By</th>
                      <th style="width: 150px;">Ticket Status</th>
                      <th style="width: 180px;">Time</th>
                      <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($cases as $case)

                        @if($user->roles[0]->name != 'admin' &&  $case->case_status == 'archieved' )
                            @continue
                        @elseif($user->roles[0]->name == 'client' && $case->user->id != $user->id)
                            @continue
                        @elseif($user->roles[0]->name == 'engineer' && $case->assigned_engineer_id != $user->id)
                            @continue
                        @endif

                        <tr>
                        <td>{{ str_pad($case->id, 4, '0', STR_PAD_LEFT) }}</td>
                        <td><a href="{{ route('backend.case.show', $case->id) }}">{{ $case->case_title }} - {{$case->case_type}}</a></td>
                        <td>
                            
                            @if($case->user)
                            {{ $case->user->name }}
                            @endif
                        </td>
                            
                            @if( $case->case_status == 'new' )
                                <td><span class="label label-default">{{ $case->case_status }}</span></td>
                            @elseif( $case->case_status == 'acknowledged' )
                                <td><span class="label label-info">{{ $case->case_status }}</span></td>
                            @elseif( $case->case_status == 'assigned' )
                                <td><span class="label label-primary">{{ $case->case_status }}</span></td>
                            @elseif( $case->case_status == 'in-progress' )
                                <td><span class="label label-warning">{{ $case->case_status }}</span></td>
                            @elseif( $case->case_status == 'completed' )
                                <td><span class="label label-success">{{ $case->case_status }}</span></td>
                            @elseif( $case->case_status == 'failed' )
                                <td><span class="label label-danger">{{ $case->case_status }}</span></td>
                            @elseif( $case->case_status == 'archieved' )
                                <td><span class="label label-danger">{{ $case->case_status }}</span></td>
                            @endif

                        
                            <td><abbr title="2016/12/04 6:32:00 PM">{{ date('d-m-Y h:i A', strtotime($case->created_at)) }}</abbr></td>
                            <td width="100">
                                <a title="View" class="btn btn-xs btn-default edit-row" href="{{ route('backend.case.show', $case->id) }}">
                                <i class="fa fa-eye"></i>
                                </a>
                                @if( (check_user_permissions(request(), 'CaseIncedent@edit')) && ($case->case_status == "new"))
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

