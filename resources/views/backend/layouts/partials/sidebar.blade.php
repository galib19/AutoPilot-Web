<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
      	<div class="sidebar_profile_pic img-circle" style="background: url(
			@if( isset($user->profile_pic) && !empty($user->profile_pic) )
				{{ url('uploads' . $user->profile_pic) }}
			@else
				{{ url('/images/avater.png') }}
			@endif

      	) no-repeat scroll center center /cover; width:50px;height: 50px;">
      		
      	</div>
      	{{--@if( isset($user->profile_pic) && !empty($user->profile_pic) )
      		<img src="{{ url('uploads' . $user->profile_pic) }}" class="img-circle" alt="User Image">
      	@else
      		<img src="{{ url('/images/avater.png') }}" class="img-circle" alt="User Image">
      	@endif--}}

      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->name }}</p>
        <a href="{{ route('backend.user.show', Auth::user()->id) }}"><i class="fa fa-circle text-success"></i> {{ $user->roles[0]['display_name'] or '' }}</a>
      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li>
        <a href="/">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li><a href="{{ route('excel.import') }}"><i class="fa fa-book fa-fw"></i> Add Sites</a></li>
      
      <li class="treeview">
        <a href="#">
          <i class="fa fa-pencil"></i>
          <span>Tickets</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('backend.ticket.index') }}"><i class="fa fa-circle-o"></i> All Tickets</a></li>
          @if( check_user_permissions(request(), 'Ticket@create') )
              <li><a href="{{ route('backend.ticket.create') }}"><i class="fa fa-circle-o"></i> Add New</a></li>
          @endif
        </ul>
      </li>
      
      @if( check_user_permissions(request(), 'Users@index') )
      <li class="treeview">
        <a href="#">
          <i class="fa fa-user fa-fw"></i>
          <span>Users</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('backend.user.index') }}"><i class="fa fa-circle-o"></i> All Users</a></li>
          @if( check_user_permissions(request(), 'Users@create') )
          <li><a href="{{ route('backend.user.create') }}"><i class="fa fa-circle-o"></i> Add New</a></li>
          @endif 
        </ul>
      </li>
      @endif
      @if( check_user_permissions(request(), 'Settings@index') )
      <li><a href="{{ route('backend.settings') }}"><i class="fa fa-cog fa-fw"></i> <span>Settings</span></a></li>
      @endif
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>