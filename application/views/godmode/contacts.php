<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?= site_url('assets/ico/favicon.ico');?>">
    <title>WebCodium</title>
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
                    <li><?= anchor('godmode/admins', 'Admins');?></li>
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
                <h2 class="sub-header">Contacts</h2>
                <?= form_open('godmode/contacts/updated');?>
                <div class="form-group">
                    <?= form_label('Email', 'email', array('class' => 'col-sm-2 control-label'));?>
                    <div class="col-sm-10">
                        <?= form_input(array(
                            'name' => 'email',
                            'value' => $contact['email'],
                            'class' => 'form-control'));?>

                    </div>
                </div>
                <div class="form-group">
                    <?= form_label('Name Company', 'name_company', array('class' => 'col-sm-2 control-label'));?>
                    <div class="col-sm-10">
                        <?= form_input(array(
                            'name' => 'name_company',
                            'value' => $contact['name_company'],
                            'class' => 'form-control'));?>

                    </div>
                </div>
                <div class="form-group">
                    <?= form_label('Phone Work', 'phone_mob', array('class' => 'col-sm-2 control-label'));?>
                    <div class="col-sm-10">
                        <?= form_input(array(
                            'name' => 'phone_mob',
                            'value' => $contact['phone_mob'],
                            'class' => 'form-control'));?>

                    </div>
                </div>
                <div class="form-group">
                    <?= form_label('Phone Home', 'phone_home', array('class' => 'col-sm-2 control-label'));?>
                    <div class="col-sm-10">
                        <?= form_input(array(
                            'name' => 'phone_home',
                            'value' => $contact['phone_home'],
                            'class' => 'form-control'));?>

                    </div>
                </div>
                <div class="form-group">
                    <?= form_label('Address', 'address', array('class' => 'col-sm-2 control-label'));?>
                    <div class="col-sm-10">
                        <?= form_input(array(
                            'name' => 'address',
                            'value' => $contact['address'],
                            'class' => 'form-control'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?= form_label('Bank Account', 'bank_account', array('class' => 'col-sm-2 control-label'));?>
                    <div class="col-sm-10">
                        <?= form_input(array(
                            'name' => 'bank_account',
                            'value' => $contact['bank_account'],
                            'class' => 'form-control'));?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <?php
                        echo form_submit(array('class' => 'btn btn-success'), 'Update');
                        ?>
                    </div>
                </div>
                <?php echo form_close();?>
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
<script src="<?= site_url('js/admin/script.js'); ?>"></script>
</body>
</html>