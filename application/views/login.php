<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <title>Topmusic</title>

    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	
	  <!-- My css -->
    <link rel="stylesheet" href="<?= site_url('css/style.css');?>">

    <!--Font awesome!-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <h2 class="white-color">Login form</h2>
      <?php $this->load->helper('form');?>
      <?= form_open('auth/login');?>
        <div class="form-group">
          <label class="white-color" for="inputLogin">Email</label>
          <input type="text" class="form-control" id="inputLogin" name="email" placeholder="Enter your email here" required>
        </div>
        <div class="form-group">
          <label class="white-color" for="inputPassword">Password</label>
          <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Enter your password here" required>
        </div>
        <button class="btn btn-primary" type="submit"><i class="fa fa-share-square-o"></i>
Submit</button>&nbsp;or&nbsp;
            <a href="index.php" type="button" class="btn btn-success"><i class="fa fa-arrow-circle-left"></i>
Back to the main page</a>
        <?= form_close();?>


      <div class="result"></div>
<!--       <h4 class="text-center white-color">Social login</h4>
      <ul class="socials-login">
        <li class="fb-login"><a href=""></a></li>
        <li class="vk-login"><a href=""></a></li>
        <li class="google-login"><a href=""></a></li>
      </ul> -->

    


  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
<!--  <!-- Latest compiled and minified JavaScript -->-->
<!--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>-->
<!--	<!-- My JavaScript -->-->
<!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
  <!-- <script src="js/ID3Reader.js"></script> -->
  <!-- <script src="js/upload.js"></script> -->
<!--   <script type="text/javascript">
    $(function() {
      $('.login-form').trigger('reset');
      $('.login-form').on('submit',function(e){
        e.preventDefault();
        var loginData = $(this).serialize();
        $.post('bin/login.php',loginData,function(data){
          // $('.result').html(data);
        });
        $(this).trigger('reset'); 
      });
    });
  </script> -->

  </body>
</html>