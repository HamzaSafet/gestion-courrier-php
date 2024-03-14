<?php
include_once 'connection.php';
 if(isset($_POST['login'])){
     $reqt="SELECT * FROM `utilisateur` WHERE 1";
     $stmt = $conx->prepare($reqt);
     $stmt->execute();
     if ($stmt->rowCount()>0) {
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            $loginValuedb = $row['logine'];
            $passwordValuedb = $row['pass'];
        }
     }

     $loginValue= $_POST['input_login'];
     $passwordValue= $_POST['input_password'];
     if($loginValue == $loginValuedb  && $passwordValue == $passwordValuedb){
        header("Location:index1.php");
     }else{
         echo"<script>
         
                 alert('Mode de passe incorect');
              </script>";
     }
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">

    <link href="static/bootstrap_fontawesome/css/bootstrap.min.css" rel="stylesheet" />
    <link href="static/css/style_login.css" rel="stylesheet" />

</head>
<body>
<style>
    .sylrform{
        margin-top: 25%;
        /* background-image: url(static/img/AS.FAR_logo.png);
        background-position:center;
        background-repeat: no-repeat;
        background-size:50%; */
        position:relative;
    }
    .btn_login{
        margin-left: 83%;
        margin-right: -101%;
    }
</style>

<form class="sylrform" method="POST">
<div class="login-reg-panel">
		<div class="login-info-box">
			<h2>Have an account?</h2>
			<p>Lorem ipsum dolor sit amet</p>
			<label id="label-register" for="log-reg-show">Login</label>
			<input type="radio" name="active-log-panel" id="log-reg-show"  checked="checked">
		</div>
							
		<div class="register-info-box">
			<h2>Vous n'avez pas de compte?</h2>
			<p>Lorem ipsum dolor sit amet</p>
			<label id="label-login" for="log-login-show">S'inscrire</label>
			<input type="radio" name="active-log-panel" id="log-login-show">
		</div>
							
		<div class="white-panel">
			<div class="login-show">
				<h2>USER</h2>
				<input type="text" class="form-control " name="input_login" id="validationServer01" placeholder="Login">
				<input type="password" class="form-control " name="input_password" id="validationServer01" placeholder="Password" required>
				<input type="submit" class="btn btn-outline-dark btn_login" name="login" value="Login">
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    Please choose a username.
                </div>
				<a href="">mot de passe oublié?</a>
			</div>
			<div class="register-show">
				<h2>S'INSCRIRE</h2>
				<input type="text" class="form-control " placeholder="login">
				<input type="password" class="form-control " placeholder="Password">
				<input type="password" class="form-control " placeholder="Confirm Password">
				<input type="button" value="S'inscrire">
			</div>
		</div>
	</div>
</form>
  <!-- page-wrapper -->

<script type="text/javascript" src="static/js/jquery-3.5.1.min.js"></script>

<script src="static/bootstrap_fontawesome/js/bootstrap.min.js"></script>


</body>
</html>

  <script>
  $(document).ready(function(){
    $('.login-info-box').fadeOut();
    $('.login-show').addClass('show-log-panel');
});


$('.login-reg-panel input[type="radio"]').on('change', function() {
    if($('#log-login-show').is(':checked')) {
        $('.register-info-box').fadeOut(); 
        $('.login-info-box').fadeIn();
        
        $('.white-panel').addClass('right-log');
        $('.register-show').addClass('show-log-panel');
        $('.login-show').removeClass('show-log-panel');
        
    }
    else if($('#log-reg-show').is(':checked')) {
        $('.register-info-box').fadeIn();
        $('.login-info-box').fadeOut();
        
        $('.white-panel').removeClass('right-log');
        
        $('.login-show').addClass('show-log-panel');
        $('.register-show').removeClass('show-log-panel');
    }
});
  
  </script>