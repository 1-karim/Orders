<?php session_start();$_SESSION['is_authenticated'] = false; require 'dataManager/data_base.php';?>
<html>
    <head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
    </head>
    <body>


    <div class="wrapper ">
      <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="">
          <img src="images/tiamedBG.png" id="icon" style="width:300px; alt="User Icon" />
        </div>

        <!-- Login Form -->
        <form method="post" action="#">
          <input type="text" id="login_username" class="fadeIn" name="login_username" placeholder="login" required autocomplete="off">
          <input type="password" id="login_password" class="fadeIn" name="login_password" placeholder="password" required autocomplete="off">
          <input type="hidden" value="1" name="login_submit">
          <input type="submit" class="btn btn-outline-danger fadeIn col-md-5" value="Log In">
        </form>

        <!-- Remind Passowrd -->
        <div id="formFooter">
          <a class="underlineHover" href="register.php">Inscription</a>
        </div>

      </div>
    </div>
        <?php 
            if(isset($_POST['login_submit'])){
                 $userManager = new UserManager($conn);
                if($userManager->login($_POST['login_username'],$_POST['login_password']) ){


                    $_SESSION['is_authenticated'] = true;
                    header("Location: http://localhost/IMEN/form1.php");

                }else{
                    echo '<div class="col-3 mx-auto alert alert-danger position-fixed fixed-top animated slideInDown fast text-center " > Combinaison erroné </div>';
                    $_SESSION['is_authenticated'] = false;
                }
            }
        ?>
    </body>
</html>
