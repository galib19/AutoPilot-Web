<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
      	<div class="sidebar_profile_pic img-circle" style="background: url(
			<?php if( isset($user->profile_pic) && !empty($user->profile_pic) ): ?>
				<?php echo e(url('uploads' . $user->profile_pic)); ?>

			<?php else: ?>
				<?php echo e(url('/images/avater.png')); ?>

			<?php endif; ?>

      	) no-repeat scroll center center /cover; width:50px;height: 50px;">
      		
      	</div>
      	

      </div>
      <div class="pull-left info">
        <p><?php echo e(Auth::user()->name); ?></p>
        <a href="<?php echo e(route('backend.user.show', Auth::user()->id)); ?>"><i class="fa fa-circle text-success"></i> <?php echo e(isset($user->roles[0]['display_name']) ? $user->roles[0]['display_name'] : ''); ?></a>
      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li>
        <a href="/">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li><a href="<?php echo e(route('excel.import')); ?>"><i class="fa fa-book fa-fw"></i> Add Sites</a></li>
      
      <li class="treeview">
        <a href="#">
          <i class="fa fa-pencil"></i>
          <span>Tickets</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo e(route('backend.ticket.index')); ?>"><i class="fa fa-circle-o"></i> All Tickets</a></li>
          <?php if( check_user_permissions(request(), 'Ticket@create') ): ?>
              <li><a href="<?php echo e(route('backend.ticket.create')); ?>"><i class="fa fa-circle-o"></i> Add New</a></li>
          <?php endif; ?>
        </ul>
      </li>
      
      <?php if( check_user_permissions(request(), 'Users@index') ): ?>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-user fa-fw"></i>
          <span>Users</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo e(route('backend.user.index')); ?>"><i class="fa fa-circle-o"></i> All Users</a></li>
          <?php if( check_user_permissions(request(), 'Users@create') ): ?>
          <li><a href="<?php echo e(route('backend.user.create')); ?>"><i class="fa fa-circle-o"></i> Add New</a></li>
          <?php endif; ?> 
        </ul>
      </li>
      <?php endif; ?>
      <?php if( check_user_permissions(request(), 'Settings@index') ): ?>
      <li><a href="<?php echo e(route('backend.settings')); ?>"><i class="fa fa-cog fa-fw"></i> <span>Settings</span></a></li>
      <?php endif; ?>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>