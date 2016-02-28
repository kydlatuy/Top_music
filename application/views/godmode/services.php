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
                <h2 class="sub-header">Services</h2>
                <?= form_open('godmode/services/updated');?>
                <div class="form-group">
                    <?= form_label('For sole traders', 'for_sole_traders', array('class' => 'col-sm-2 control-label'));?>
                    <div class="col-sm-10">
                        <?= form_textarea(array(
                            'name' => 'for_sole_traders',
                            'value' => $services['for_sole_traders'],
                            'class' => 'form-control'));?>

                    </div>
                </div>
                <div class="form-group">
                    <?= form_label('Legislation of Limited Liability Company (LLC), Joint Stock Company (JSC), Public Organization, etc.', 'llc', array('class' => 'col-sm-2 control-label'));?>
                    <div class="col-sm-10">
                        <?= form_textarea(array(
                            'name' => 'llc',
                            'value' => $services['llc'],
                            'class' => 'form-control'));?>

                    </div>
                </div>

                <div class="form-group">
                    <?= form_label('Legal support of international investments into Ukrainian companies', 'legal_support', array('class' => 'col-sm-2 control-label'));?>
                    <div class="col-sm-10">
                        <?= form_textarea(array(
                            'name' => 'legal_support',
                            'value' => $services['legal_support'],
                            'class' => 'form-control'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?= form_label('Rent of business adress in Lviv (Ukraine) for business activity', 'rent_business', array('class' => 'col-sm-2 control-label'));?>
                    <div class="col-sm-10">
                        <?= form_textarea(array(
                            'name' => 'rent_business',
                            'value' => $services['rent_business'],
                            'class' => 'form-control'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?= form_label('Legal support while exchange of CEO(Director), business activities, business adress, founders, and other changes in statute (chapter)', 'legal_support', array('class' => 'col-sm-2 control-label'));?>
                    <div class="col-sm-10">
                        <?= form_textarea(array(
                            'name' => 'legal_support',
                            'value' => $services['legal_support'],
                            'class' => 'form-control'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?= form_label('Getting information about companies from legal registries', 'getting_information', array('class' => 'col-sm-2 control-label'));?>
                    <div class="col-sm-10">
                        <?= form_textarea(array(
                            'name' => 'getting_information',
                            'value' => $services['getting_information'],
                            'class' => 'form-control'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?= form_label('Legal support of company liquidation', 'legal_support_company', array('class' => 'col-sm-2 control-label'));?>
                    <div class="col-sm-10">
                        <?= form_textarea(array(
                            'name' => 'legal_support_company',
                            'value' => $services['legal_support_company'],
                            'class' => 'form-control'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?= form_label('Help in cases about the bankruptcy', 'help_in_cases', array('class' => 'col-sm-2 control-label'));?>
                    <div class="col-sm-10">
                        <?= form_textarea(array(
                            'name' => 'help_in_cases',
                            'value' => $services['help_in_cases'],
                            'class' => 'form-control'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?= form_label('Subscription accounting,taxes and legal service', 'subscription_accounting', array('class' => 'col-sm-2 control-label'));?>
                    <div class="col-sm-10">
                        <?= form_textarea(array(
                            'name' => 'subscription_accounting',
                            'value' => $services['subscription_accounting'],
                            'class' => 'form-control'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?= form_label('IP legislation, Registering of trade marks', 'ip_legislation', array('class' => 'col-sm-2 control-label'));?>
                    <div class="col-sm-10">
                        <?= form_textarea(array(
                            'name' => 'ip_legislation',
                            'value' => $services['ip_legislation'],
                            'class' => 'form-control'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?= form_label('Law services for corporations (Joint stock companies)', 'law_services', array('class' => 'col-sm-2 control-label'));?>
                    <div class="col-sm-10">
                        <?= form_textarea(array(
                            'name' => 'law_services',
                            'value' => $services['law_services'],
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