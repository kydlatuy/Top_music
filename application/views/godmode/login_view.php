<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?= site_url('assets/ico/favicon.ico');?>">
    <title>Lviv Expert</title>
    <!-- Bootstrap core CSS -->
    <link href="<?= site_url('css/bootstrap.min.css');?>" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="<?= site_url('css/bootstrap-theme.min.css');?>" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container theme-showcase" role="main">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="jumbotron">
                <h2 class="sub-header">Admin</h2>
                <div class="container">
                    <div class="form-group">
                        <?php
                        $this->load->helper('form');?>

                        <div class="form-horizontal" role="form">
                            <?php if(isset($data)) : ?>
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>Email or Password not correct </strong>
                                </div>
                            <?php endif ; ?>
                            <?php echo form_open('godmode/auth/login');?>
                            <?= form_label('Email', 'email', array('for' => 'exampleInputEmail1', ));?>
                            <?php echo form_error('email');?>
                            <?= form_input(array(
                                'name' => 'email',
                                'class' => 'form-control',
                                'id' => 'exampleInputEmail1',
                                'rules'   => 'required',
                                'placeholder' => 'Enter email'));?>
                        </div>
                        <div class="form-group">
                            <?= form_label('Password', 'password', array('for' => 'exampleInputPassword1'));?>
                            <?php echo form_error('password');?>
                            <?= form_input(array(
                                'name' => 'password',
                                'type' => 'password',
                                'class' => 'form-control',
                                'id' => 'exampleInputEmail1',
                                'rules'   => 'required',
                                'placeholder' => 'Password'));?>
                        </div>
                    </div>
                    <?= form_reset(array('class' => 'btn btn-primary'), 'Reset');?>
                    <?= form_submit(array('class' => 'btn btn-success'), 'Enter');?>
                    <?php echo form_close();?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?= site_url('js/admin/bootstrap.min.js');?>"></script>
<script src="<?= site_url('js/admin/script.js'); ?>"></script></body>
</html>