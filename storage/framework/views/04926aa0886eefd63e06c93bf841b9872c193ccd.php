<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Styles -->
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="/backend/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/backend/plugins/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/backend/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/backend/css/skins/_all-skins.min.css">
	
	<!-- Bootstrap DateTime Picker -->
    <link rel="stylesheet" href="/backend/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css">
	<!-- iCheck -->
    <link rel="stylesheet" href="/backend/plugins/iCheck/all.css">

    <link href="<?php echo e(asset('backend/css/app-backend.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('backend/css/helper_style.css')); ?>" rel="stylesheet">

</head>
<body class="hold-transition skin-blue sidebar-mini">

    <div id="app" class="wrapper">

    	<?php
    		$users = Auth::user();
    		$user_metas = Auth::user()->usermeta;
    		$user_roles = Auth::user()->roles->toArray();
    		
    		$user_meta_data = array();
    		foreach ($user_metas as $user_meta) {
    			if( $user_meta['meta_key'] == 'profile_pic' ){
    				$profile_pic_thumb_url = unserialize($user_meta['meta_value']);
    				$user_meta_data[$user_meta['meta_key']] = ( !empty($profile_pic_thumb_url) ? $profile_pic_thumb_url['url_thumb'] : null );
    			}
    			else{
    				$user_meta_data[$user_meta['meta_key']] = ( !empty($user_meta['meta_value']) ? $user_meta['meta_value'] : null );
    			}
    		}
    		$user1 = array_merge($users->toArray(), $user_meta_data);

    		if( !empty($user_roles) ){
    			$user = (object)array_merge($user1, $user_roles);
    		}
    		else{
    			$user = (object)$user1;
    		}

    		
    	?>


        <?php echo $__env->make('backend.layouts.partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('backend.layouts.partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

        	<div class="top_notification_message">
        		<div class="panel-body">
        			<?php if(session('message')): ?>
        			    <div class="alert alert-info">
        			        <?php echo e(session('message')); ?>

        			    </div>
        			<?php endif; ?>
        			<?php if(session('success-message')): ?>
        		        <div class="alert alert-success">
        		            <?php echo e(session('success-message')); ?>

        		        </div>
        		    <?php endif; ?>
        		    <?php if(session('warning-message')): ?>
        		        <div class="alert alert-warning">
        		            <?php echo e(session('warning-message')); ?>

        		        </div>
        		    <?php endif; ?>
        		    <?php if(session('error-message')): ?>
        		        <div class="alert alert-danger">
        		            <?php echo e(session('error-message')); ?>

        		        </div>
        		    <?php endif; ?>
        		</div>
        	</div>

            <?php echo $__env->yieldContent('title'); ?>

            <?php echo $__env->yieldContent('content'); ?>


        </div>
        <!-- /.content-wrapper -->



        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                Developed by Brainstation-23.com
            </div>
            Copyright &copy; <?php echo e(date('Y')); ?> <strong>Brain Station 23</strong> All rights reserved.
        </footer>

        
    </div> <!-- #app -->


    <?php echo $__env->yieldContent('script'); ?>
    <!-- Scripts -->
    <!-- jQuery 2.2.3 -->
    <script src="/backend/js/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="/backend/js/bootstrap.min.js"></script>
	
	<!-- Bootstrap DateTime Picker -->
    <script src="/backend/plugins/bootstrap-datetimepicker/moment-with-locales.min.js"></script>
    <script src="/backend/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
    <!-- iCheck for Checkbox-->
    <script src="/backend/plugins/iCheck/iCheck.min.js"></script>
    
    <!-- AdminLTE App -->
    <script src="/backend/js/app.min.js"></script>
    <script src="/backend/js/custom.js"></script>

    
</body>
</html>
