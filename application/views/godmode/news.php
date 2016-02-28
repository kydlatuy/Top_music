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
                <h2 class="sub-header">News</h2>
                <a class="btn btn-success" href="<?= site_url("godmode/news/created");?>">Add</a>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th><a class="sorting <?php if ($title == 'id') : ?><?= $order; ?><?php endif;?>" data-title="id" data-order="<?php if ($title == 'id') : ?><?= $order; ?><?php else : ?>asc<?php endif;?>" href="<?= site_url('godmode/news');?>">id</a></th>
                            <th><a class="sorting <?php if ($title == 'title') : ?><?= $order; ?><?php endif;?>" data-title="title" data-order="<?php if ($title == 'title') : ?><?= $order; ?><?php else : ?>asc<?php endif;?>" href="<?= site_url('godmode/news');?>">Title</a></th>
                            <th><a class="sorting <?php if ($title == 'text') : ?><?= $order; ?><?php endif;?>" data-title="text" data-order="<?php if ($title == 'text') : ?><?= $order; ?><?php else : ?>asc<?php endif;?>" href="<?= site_url('godmode/news');?>">Text</a></th>
                            <th><a class="sorting <?php if ($title == 'date_created') : ?><?= $order; ?><?php endif;?>" data-title="date_created" data-order="<?php if ($title == 'date_created') : ?><?= $order; ?><?php else : ?>asc<?php endif;?>" href="<?= site_url('godmode/news');?>">Date Created</a></th>
                            <th><a class="sorting <?php if ($title == 'date_updated') : ?><?= $order; ?><?php endif;?>" data-title="date_updated" data-order="<?php if ($title == 'date_updated') : ?><?= $order; ?><?php else : ?>asc<?php endif;?>" href="<?= site_url('godmode/news');?>">Date Updated</a></th>
                          <th><span>Actions</span></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($news as $new) : ?>
                            <tr>
                                <td><?= $new['id']; ?></td>
                                <td><?= $new['title']; ?></td>
                                <td><?= $new['content']; ?></td>
                                <td><?= $new['date_created'];?></td>
                                <td><?= $new['date_updated']; ?></td>
                                <td><a class="btn btn-primary" href="<?= site_url("godmode/news/update/".$new['id']);?>">Edit</a>
                                    <button class="btn btn-danger btn-delete" data-id="<?php echo $new['id'] ?>" data-toggle="modal" data-target="#myModal" >Delete</button></td>
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
                <h4 class="modal-title" id="myModalLabel">News</h4>
            </div>
            <div class="modal-body">
                <h4>Are you sure you want to delete?</h4>
            </div>
            <div class="modal-footer">
                <button  type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a id="butOk" class="btn btn-danger" href="<?= site_url("godmode/news/delete/");?>">Delete</a>
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
<script src="<?= site_url('js/admin/admins_sorting.js'); ?>"></script>
<script src="<?= site_url('js/admin/delete_page.js'); ?>"></script>
</body>
</html>
