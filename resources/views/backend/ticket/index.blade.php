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
                      <th>Site ID  - Problem Type</th>
                      <th style="width: 180px;">Created By</th>
                      <th style="width: 150px;">Ticket Status</th>
                      <th style="width: 180px;">Time</th>
                      <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($tickets as $ticket)

                        @if($user->roles[0]->name != 'admin' &&  $ticket->ticket_status == 'archieved' )
                            @continue
                        @elseif($user->roles[0]->name == 'client' && $ticket->user->id != $user->id)
                            @continue
                        @elseif($user->roles[0]->name == 'engineer' && $ticket->assigned_engineer_id != $user->id)
                            @continue
                        @endif

                        <tr>
                        <td>{{ str_pad($ticket->id, 4, '0', STR_PAD_LEFT) }}</td>
                        <td><a href="{{ route('backend.ticket.show', $ticket->id) }}">{{ $ticket->site_id }} - {{$ticket->ticket_type}}</a></td>
                        <td>
                            
                            @if($ticket->user)
                            {{ $ticket->user->name }}
                            @endif
                        </td>
                            
                            @if( $ticket->ticket_status == 'new' )
                                <td><span class="label label-default">{{ $ticket->ticket_status }}</span></td>
                            @elseif( $ticket->ticket_status == 'acknowledged' )
                                <td><span class="label label-info">{{ $ticket->ticket_status }}</span></td>
                            @elseif( $ticket->ticket_status == 'assigned' )
                                <td><span class="label label-primary">{{ $ticket->ticket_status }}</span></td>
                            @elseif( $ticket->ticket_status == 'in-progress' )
                                <td><span class="label label-warning">{{ $ticket->ticket_status }}</span></td>
                            @elseif( $ticket->ticket_status == 'completed' )
                                <td><span class="label label-success">{{ $ticket->ticket_status }}</span></td>
                            @elseif( $ticket->ticket_status == 'failed' )
                                <td><span class="label label-danger">{{ $ticket->ticket_status }}</span></td>
                            @elseif( $ticket->ticket_status == 'archieved' )
                                <td><span class="label label-danger">{{ $ticket->ticket_status }}</span></td>
                            @endif

                        
                            <td><abbr title="2016/12/04 6:32:00 PM">{{ date('d-m-Y h:i A', strtotime($ticket->raised_time)) }}</abbr></td>
                            <td width="100">
                                <a title="View" class="btn btn-xs btn-default edit-row" href="{{ route('backend.ticket.show', $ticket->id) }}">
                                <i class="fa fa-eye"></i>
                                </a>
                                @if( (check_user_permissions(request(), 'Ticket@edit')) && ($ticket->ticket_status == "new"))
                                <a title="Edit" class="btn btn-xs btn-default edit-row" href="{{ route('backend.ticket.edit', $ticket->id) }}">
                                <i class="fa fa-edit"></i>
                                </a>
                                @endif
                                @if( check_user_permissions(request(), 'Ticket@destroy') )
                                {!! Form::open(['method' => 'DELETE', 'route' => ['backend.ticket.destroy', $ticket->id], 'class' => 'd_inline_b']) !!}
                                
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
                {!! $tickets->links() !!}
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

