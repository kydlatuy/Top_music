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
    <link href="<?= site_url('css/style.css');?>" rel="stylesheet">

    <!-- Bootstrap theme -->
    <link href="<?= site_url('css/bootstrap-theme.min.css');?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- include libries(jQuery, bootstrap, fontawesome) -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= site_url('godmode/about');?>">Dashboard</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><?= anchor('godmode/messages', 'Messages');?></li>
                    <li class="active"><?= anchor('godmode/admins', 'Admins');?></li>
                    <li><?= anchor('godmode/settings', 'Settings');?></li>
                    <li><?= anchor('godmode/logout', 'Logout');?></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li><a href="<?= site_url('godmode/about');?>">About</a></li>
                <li><a href="<?= site_url('godmode/contacts');?>">Contacts</a></li>
                <li><a href="<?= site_url('godmode/services');?>">Services</a></li>
                <li><a href="<?= site_url('godmode/news');?>">News</a></li>
                <li><a href="">Comments</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <div class="form-horizontal" role="form">
                <h2 class="sub-header">Admin<?php if(isset($admins)){?> Update<?php } else { ?>  Add<?php } ?></h2>
                <?php
                if (isset($admins)) {
                    foreach ($admins as $admin) {

                    }
                }?>
                <?php $this->load->helper('form');?>
                <div class="form-horizontal" role="form">
                    <?php if (isset($admins)) {
                        echo form_open('godmode/admins/update/' . $admin['id']);
                        echo form_hidden('id', $admin['id']);
                    }
                    else {
                        echo form_open('godmode/admins/create');
                    }?>
                    <?php if ( form_error('email')) : ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?=form_error('email')?>
                        </div>
                    <?php endif; ?>
                    <div class="form-group<?php if ( form_error('first_name')) { ?> has-error has-feedback<?php } ?>">
                        <?= form_label('First name', 'first_name', array('class' => 'col-sm-2 control-label'));?>
                        <div class="col-sm-10">

                            <?php  if (isset($admin['first_name'])){
                                echo form_input(array(
                                    'name' => 'first_name',
                                    'value' => $admin['first_name'],
                                    'class' => 'form-control'));
                            }
                            else{
                                echo form_input(array(
                                    'name' => 'first_name',
                                    'class' => 'form-control'));
                            }?>
                            <?php if ( form_error('first_name')) :?>
                                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group<?php if ( form_error('email')) { ?> has-error has-feedback<?php } ?>">
                        <?= form_label('Email', 'email', array('class' => 'col-sm-2 control-label'));?>
                        <div class="col-sm-10">

                            <?php  if (isset($admin['email'])){
                                echo form_input(array(
                                    'name' => 'email',
                                    'value' => $admin['email'],
                                    'class' => 'form-control'));
                            }
                            else{
                                echo form_input(array(
                                    'name' => 'email',
                                    'class' => 'form-control'));
                            }?>
                            <?php if ( form_error('email')) :?>
                                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if ( form_error('password')) : ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?=form_error('password')?>
                        </div>
                    <?php endif; ?>
                    <div class="form-group<?php if ( form_error('password')) { ?> has-error has-feedback<?php } ?>">
                        <?= form_label('Password', 'password', array('class' => 'col-sm-2 control-label'));?>
                        <div class="col-sm-10">
                            <?= form_input(array(
                                'name' => 'password',
                                'type' => 'password',
                                'class' => 'form-control'));?>
                            <?php if ( form_error('password')) :?>
                                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if ( form_error('repeat_password')) : ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?=form_error('repeat_password')?>
                        </div>
                    <?php endif; ?>
                    <div class="form-group<?php if ( form_error('repeat_password')) { ?> has-error has-feedback<?php } ?>">
                        <?= form_label('Repeat Password ', 'repeat_password', array('class' => 'col-sm-2 control-label'));?>
                        <div class="col-sm-10">
                            <?= form_input(array(
                                'name' => 'repeat_password',
                                'type' => 'password',
                                'class' => 'form-control'));?>
                            <?php if ( form_error('repeat_password')) :?>
                                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <a class="btn btn-primary" href="<?= site_url("godmode/admins");?>">Back</a>
                            <?php if (isset($admin['email'])) {
                                echo form_submit(array('class' => 'btn btn-success'), 'Update');
                            }
                            else {
                                echo form_submit(array('class' => 'btn btn-success'), 'Create');
                            }?>
                        </div>
                    </div>
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
<script src="<?= site_url('assets/js/docs.min.js');?>"></script>
</body>
</html>