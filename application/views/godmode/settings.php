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
                <a class="navbar-brand" href="<?= site_url('godmode/webcodium');?>">Dashboard</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><?= anchor('godmode/messages', 'Messages');?></li>
                    <li><?= anchor('godmode/admins', 'Admins');?></li>
                    <li class="active"><?= anchor('godmode/settings', 'Settings');?></li>
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
                <h2 class="sub-header">Settings</h2>
                <?= form_open('godmode/settings/update');?>
                <div class="form-group">
                    <?= form_label('Site Title', 'site_title', array('class' => 'col-sm-2 control-label'));?>
                    <div class="col-sm-10">
                        <?= form_input(array(
                            'name' => 'site_title',
                            'value' => $settings['site_title'],
                            'class' => 'form-control'));?>

                    </div>
                </div>
                <div class="form-group">
                    <?= form_label('Site Description', 'site_description', array('class' => 'col-sm-2 control-label'));?>
                    <div class="col-sm-10">
                        <?= form_textarea(array(
                            'name' => 'site_description',
                            'value' => $settings['site_description'],
                            'class' => 'form-control'));?>

                    </div>
                </div>
                <div class="form-group">
                    <?= form_label('Site Keywords', 'site_keywords', array('class' => 'col-sm-2 control-label'));?>
                    <div class="col-sm-10">
                        <?= form_input(array(
                            'name' => 'site_keywords',
                            'value' => $settings['site_keywords'],
                            'class' => 'form-control'));?>

                    </div>
                </div>
                <div class="form-group">
                    <?= form_label('Author', 'author', array('class' => 'col-sm-2 control-label'));?>
                    <div class="col-sm-10">
                        <?= form_input(array(
                            'name' => 'author',
                            'value' => $settings['author'],
                            'class' => 'form-control'));?>

                    </div>
                </div>
                <div class="form-group">
                    <?= form_label('Copyright', 'copyright', array('class' => 'col-sm-2 control-label'));?>
                    <div class="col-sm-10">
                        <?= form_input(array(
                            'name' => 'copyright',
                            'value' => $settings['copyright'],
                            'class' => 'form-control'));?>

                    </div>
                </div>
                <div class="form-group">
                    <?= form_label('Reply-to email', 'reply_to_email', array('class' => 'col-sm-2 control-label'));?>
                    <div class="col-sm-10">
                        <?= form_input(array(
                            'name' => 'reply_to_email',
                            'value' => $settings['reply_to_email'],
                            'class' => 'form-control'));?>

                    </div>
                </div>
                <div class="form-group">
                    <?= form_label('Google Analytics Site ID', 'google_analytics_site_id', array('class' => 'col-sm-2 control-label'));?>
                    <div class="col-sm-10">
                        <?= form_input(array(
                            'name' => 'google_analytics_site_id',
                            'value' => $settings['google_analytics_site_id'],
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