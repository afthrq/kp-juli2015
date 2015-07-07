<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>CodeIgniter Bootstrap</title>
    <meta charset="utf-8">
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/timeline.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/morris.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/metisMenu.min.css"') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/sb-admin-2.css') ?>" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <div class="login-panel panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Please Sign In</h3>
            </div>
            <div class="panel-body">
              <?php
              
              echo form_open('user/validate_credentials');
              echo "<div class='form-group'>";
                $username = array(
                'name' => 'user_name',
                'placeholder' => 'Username',
                'class' => 'form-control',
                );
                echo form_input($username);
              echo "</div>";
              $password = array(
              'name' => 'password',
              'placeholder' => 'Password',
              'class' => 'form-control',
              );
              echo form_password($password);
              if(isset($message_error) && $message_error){
              echo '<div class="alert alert-error">';
                echo '<a class="close" data-dismiss="alert">×</a>';
                echo '<strong>Oh snap!</strong> Change a few things up and try submitting again.';
              echo '</div>';
              }
              echo "<br />";
              echo form_submit('submit', 'Login', 'class="btn btn-lg btn-success btn-block"');
              echo form_close();
              ?>
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/lodash.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/metisMenu.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/raphael-min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/morris-data.js')?>"></script>
    <script src="<?php echo base_url('assets/js/morris.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/sb-admin-2.js')?>"></script>
  </body>
</html>