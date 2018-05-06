<header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>QF</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>QuickForce</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
		

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
					
					@if( isset($user->profile_pic) && !empty($user->profile_pic) )
						<img src="{{ url('uploads' . $user->profile_pic) }}" class="user-image" alt="User Image">
					@else
						<img src="{{ url('/images/avater.png') }}" class="user-image" alt="User Image">
					@endif

                    {{--<img src="{{ if(  ) {url( ('uploads' . $user->profile_pic)) }  else{ '/images/avater.png' } }}" class="user-image" alt="User Image"> --}}
                    <span class="hidden-xs">{{ Auth::user()->name }}</span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">

                    	@if( isset($user->profile_pic) && !empty($user->profile_pic) )
                    		<img src="{{ url('uploads' . $user->profile_pic) }}" class="img-circle" alt="User Image">
                    	@else
                    		<img src="{{ url('/images/avater.png') }}" class="img-circle" alt="User Image">
                    	@endif

                      <p>
                        {{ Auth::user()->name }}
                        <!-- <small>Member since Nov. 2012</small> -->
                      </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                      <div class="pull-left">
                        <a href="{{ route('backend.user.show', Auth::user()->id) }}" class="btn btn-default btn-flat">Profile</a>
                      </div>
                      <div class="pull-right">

                        <a href="{{ route('logout') }}"  class="btn btn-default btn-flat"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>

                      </div>
                    </li>
                  </ul>
                </li>
            </ul>
        </div>
    </nav>

</header>