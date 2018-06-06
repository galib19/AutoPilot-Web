<html lang="en">
<head>
    <title>Autopilot</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
</head>
<body>
    <div class="panel panel-primary">
 <div class="panel-heading text-center"><h3>Autopilot: Site List Update (importing excel to database)</h3></div>
  <div class="panel-body"> 
  <div class="row">
    <a style="margin-left: 20px;" href="<?php echo e(route('home')); ?>">Back to Home</a> 
      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <a href="<?php echo e(route('excel-file',['type'=>'xls'])); ?>">Download Excel xls</a> |
        <a href="<?php echo e(route('excel-file',['type'=>'xlsx'])); ?>">Download Excel xlsx</a> |
        <a href="<?php echo e(route('excel-file',['type'=>'csv'])); ?>">Download CSV</a>
      </div>
   </div>    <hr>
       <?php echo Form::open(array('route' => 'import-csv-excel','method'=>'POST','files'=>'true')); ?>

        <div class="row">
           <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <?php echo Form::label('sample_file','Select xl or csv File to Import:',['class'=>'col-md-3 btn btn-primary']); ?>

                     
                    <div class="col-md-9 text-center">
                    <?php echo Form::file('sample_file', array('class' => 'form-control')); ?>

                    <?php echo $errors->first('sample_file', '<p class="alert alert-danger">:message</p>'); ?>

                    </div>
                </div>
            </div><hr><hr>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <?php echo Form::submit('Upload',['class'=>'btn btn-success btn-block']); ?>

            </div>
        </div>
       <?php echo Form::close(); ?>

 </div>
</div>
</body>
</html>