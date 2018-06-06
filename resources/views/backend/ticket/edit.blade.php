@extends('backend.layouts.app-backend')


@section('title')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Edit Ticket
          <!-- <small>Cases</small> -->
        </h1>
        <ol class="breadcrumb">
          <li><i class="fa fa-dashboard"></i> <a href="#">Dashboard</a></li>
          <li class="active">Tickets</li>
        </ol>

        <div class="panel-body">
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>

    </section>

@endsection


@section('content')

    <!-- Main content -->
    <section class="content">
	
      	<div class="row">

			{!! Form::model($tickets, [
			  'method' => 'PUT',
			  'route'  => ['backend.ticket.update', $tickets->id],
			  'files'  => TRUE,
			  'id' => 'post-form'
			]) !!}

				@include('backend.ticket.form')

			{!! Form::close() !!}



      	</div>
    	<!-- ./row -->

		<div class="row">
			<div class="footer_section">
				<div class="col-xs-12">
					
					<div class="box">

						<div class="box-footer clearfix">
							<a href="{{ route('backend.ticket.index') }}"><i class="fa fa-angle-left fa-lg"></i>&nbsp; Back to list</a>
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

