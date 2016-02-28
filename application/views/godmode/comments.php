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
                <a class="navbar-brand" href="<?= site_url('godmode/webcodium');?>">Dashboard</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><?= anchor('godmode/messages', 'Messages');?></li>
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
                <li><a href="">Services</a></li>
                <li><a href="">News</a></li>
                <li><a href="">Comments</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <div class="form-horizontal" role="form">
                <h2 class="sub-header">Messages</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th><a class="sorting <?php if ($title == 'id') : ?><?= $order; ?><?php endif;?>" data-title="id" data-order="<?php if ($title == 'id') : ?><?= $order; ?><?php else : ?>asc<?php endif;?>" href="<?= site_url('godmode/messages');?>">id</a></th>
                            <th><a class="sorting <?php if ($title == 'first_name') : ?><?= $order; ?><?php endif;?>" data-title="first_name" data-order="<?php if ($title == 'first_name') : ?><?= $order; ?><?php else : ?>asc<?php endif;?>" href="<?= site_url('godmode/messages');?>">First Name</a></th>
                            <th><a class="sorting <?php if ($title == 'email') : ?><?= $order; ?><?php endif;?>" data-title="email" data-order="<?php if ($title == 'email') : ?><?= $order; ?><?php else : ?>asc<?php endif;?>" href="<?= site_url('godmode/messages');?>">Email</a></th>
                            <th><a class="sorting <?php if ($title == 'message') : ?><?= $order; ?><?php endif;?>" data-title="message" data-order="<?php if ($title == 'message') : ?><?= $order; ?><?php else : ?>asc<?php endif;?>" href="<?= site_url('godmode/messages');?>">Messages</a></th>
                            <th><a class="sorting <?php if ($title == 'date_created') : ?><?= $order; ?><?php endif;?>" data-title="date_created" data-order="<?php if ($title == 'date_created') : ?><?= $order; ?><?php else : ?>asc<?php endif;?>" href="<?= site_url('godmode/messages');?>">Date Created</a></th>
                            <th><span>Actions</span></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($messages as $message) : ?>
                            <tr>
                                <td><?= $message['id']; ?></td>
                                <td><?= $message['first_name']; ?></td>
                                <td><?= $message['email']; ?></td>
                                <td><?= $message['message']; ?></td>
                                <td><?= $message['date_created'];?></td>
                                <td><a class="btn btn-primary" href="<?= site_url("godmode/messages/update/".$message['id']);?>">Edit</a>
                                    <button class="btn btn-danger btn-delete" data-id="<?php echo $message['id'] ?>" data-toggle="modal" data-target="#myModal" >Delete</button></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php if(strlen($pagination)) : ?>
                    <div class="col-md-12 text-center">
                        <?php echo $pagination; ?>
                        <?php endif ; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Admin</h4>
            </div>
            <div class="modal-body">
                <h4>Are you sure you want to delete?</h4>
            </div>
            <div class="modal-footer">
                <button  type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a id="butOk" class="btn btn-danger" href="<?= site_url("godmode/messages/delete/");?>">Delete</a>
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
<script src="<?= site_url('js/admin/messages_sorting.js'); ?>"></script>
<script src="<?= site_url('js/admin/delete_page.js'); ?>"></script>
</body>
</html>                          