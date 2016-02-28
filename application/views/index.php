<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>TopMusic</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= site_url('css/style.css');?>">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '176275259415143',
            xfbml      : true,
            version    : 'v2.5'
        });
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-3 col-md-push-9">
            <div class="find">
                <ul class="log-in">
                     <li><a href="<?= site_url('login');?>">Log in</a></li>
                    <li><a href="<?= site_url('register');?>">Register</a></li>
                    <li><a href="login-author.html">Log in to share music <span class="glyphicon glyphicon-share" aria-hidden="true"></span></a></li>
                </ul>
                <input class="music-search" type="text" placeholder="&#xf002; search author" />
            </div>
        </div>
        <div class="col-xs-12 col-md-4 col-md-push-2">
            <div class="music-wrapper">
                <div class="player">
                    <div class="player-image">
                        <img src="<?= site_url('images/foto.jpg');?>" alt="poster" class="img-responsive" />
                    </div>
                    <hr class="line-horizon">
                    <div class="music-info">
                    </div>
                    <div class="media-player">
                        <div class="media-controllers">
                            <i class="fa fa-backward"></i>
                            <i class="fa global fa-play"></i>
                            <i class="fa fa-forward"></i>
                        </div>
                        <div class="media-toddler">
                            <div class="song-description">Select song from a playlist
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                </div>
                            </div>
                        </div>
                        <div class="media-options">
                            <i class="fa fa-random"></i>
                            <i class="fa fa-volume-off"></i>
                            <i class="fa fa-repeat"></i>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:90%">
                                </div>
                            </div>
                        </div>
                    </div>
                    <audio class="audio-player" preload="none" id="myAudio">
                        <source src="" type="audio/mpeg">
                    </audio>
                </div>
                <ul class="socials">
                    <li class="fb"><a href=""></a></li>
                    <li class="vk"><a href=""></a></li>
                    <li class="twitter"><a class="twitter popup" href="https://twitter.com/intent/tweet?url=https%3A%2F%2Ftopmusic.ho.ua&hashtags=ILoveThisSong&text="></a></li>
                </ul>
                <ul class="stars">
                    <li class="star"><i class="fa fa-star"></i></li>
                    <li class="star"><i class="fa fa-star"></i></li>
                    <li class="star"><i class="fa fa-star"></i></li>
                    <li class="star"><i class="fa fa-star"></i></li>
                    <li class="star"><i class="fa fa-star"></i></li>
                    <li class="refresh"><i class="fa fa-refresh"></i></li>
                </ul>
            </div>
        </div>
        <div class=" col-xs-12 col-md-5 col-md-pull-7">
            <div class="playlist">
                <div class="authors-wrapper">
                    <div class="authors-header">
                        Authors
                    </div>
                    <div class="list-wrapper">
                        <ul class="authors">
<!--                            --><?php
//                            include 'bin/authors.php';
//                            ?>
                        </ul>
                    </div>
                    <div class="authors-footer">
                        <i class="fa fa-angle-down"></i>
                    </div>
                </div>
                <div class="songs-wrapper">
                    <div class="songs-header">
                        Songs
                    </div>
                    <div class="list-wrapper">
                        <ul class="songs">
<!--                            --><?php
//                            include 'bin/songs.php';
//                            ?>
                        </ul>
                    </div>
                    <div class="songs-footer">
                        <i class="fa fa-angle-down"></i>
                    </div>
                </div>
                <div class="favorites-wrapper">
                    <div class="favorites-header">
                        Favorites
                    </div>
                    <div class="list-wrapper">
                        <ul class="favorites">
<!--                            --><?php
//                            include 'bin/favorites.php';
//                            ?>
                        </ul>
                    </div>
                    <div class="favorites-footer">
                        <i class="fa fa-angle-down"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer>
    <div class="container">
        <div class="nav-wrapper">
            <div class="slide-wrapper">
                <ul class="genres">
                    <li><a class="active" href="#">All</a></li>
<!--                    --><?php
//                    include 'bin/genres.php';
//                    ?>
                </ul>
                <div class="footer-toggle hidden-lg hidden-md hidden-sm">
                    <a href="#">
                        <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Select genre
                    </a>
                </div>
            </div>
            <div class="nav-controls hidden-xs">
                <i class="fa fa-angle-left"></i>
                <i class="fa fa-angle-right"></i>
            </div>
        </div>

    </div>
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="js/customs.js"></script>
</body>
</html>