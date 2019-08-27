<html>
<?php require'dataManager/data_base.php';
?>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!------ Include the above in your HEAD tag ---------->
    <style>

    </style>
</head>

<body class="container ">
<h1 class="display-4 text-center">Ajouter un utilisateur </h1>
<button class="btn btn-outline-secondary position-fixed" style="left:5px;top:5px" id="retour">Retour</button>
<form class="col-md-6 offset-md-3 needs-validation" method="POST" action="#" novalidate>

         <div class="form-row">
            <div class="form-group col-md-6">
            <label for="register_nom">nom</label>
            <input type="text" name="register_nom" id="register_nom" class="form-control" required autocomplete="off">
            <span class="invalid-tooltip">
                Champs obligatoire
            </span>
            </div>

        <div class="form-group col-md-6">
            <label for="register_prenom">prenom</label>
            <input type="text" name="register_prenom" id="register_prenom" class="form-control" required autocomplete="off">
            <span class="invalid-tooltip">
                Champs obligatoire
            </span>
        </div>
        <div class="form-group col-6">
            <label for="register_username">username</label>
            <input type="text" name="register_username" id="register_username" class="form-control" required autocomplete="off">
            <span class="invalid-tooltip">
                Champs obligatoire
            </span>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="register_password">mdp</label>
            <input type="password" name="register_password" id="register_password" class="form-control" required autocomplete="off">
            <span class="invalid-tooltip">
                Champs obligatoire
            </span>
        </div>

        <div class="form-group col-md-6">
            <label for="register_confirm_password">confirmer mdp</label>
            <input type="password" name="register_confirm_password" id="register_confirm_password" class="form-control" required autocomplete="off">
            <span class="invalid-tooltip">
                Champs obligatoire
            </span>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="register_role">role</label>
            <select  name="register_role" id="register_role" class="form-control">
                <option value="ROLE_USER">USER</option>
                <option value="ROLE_ADMIN">ADMIN</option>
            </select>
            <span class="invalid-tooltip">
                Champs obligatoire
            </span>
        </div>
    </div>



    <div class="form-row">
        <input type="hidden" value="1" name="register_submit">
        <input type="submit" class="btn btn-outline-primary col-md-5 mx-auto" value="submit">
        <input type="reset" class="btn btn-outline-secondary col-md-5 mx-auto " value="reset">
    </div>
</form>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    $('#retour').click( function(){
        window.location.replace("http://localhost/IMEN/index.php");
    })
</script>
<?php
    if(isset($_POST['register_submit']) ){
        if($_POST['register_password'] == $_POST['register_confirm_password']){




        $newUser = new User([
            'nom' => $_POST['register_nom'],
            'prenom' => $_POST['register_prenom'],
            'username' => $_POST['register_username'],
            'password' => $_POST['register_password'],
            'role' => $_POST['register_role']

        ]);

         $userManager = new UserManager($conn);
        if($userManager->add($newUser)){
            echo'<div class="alert alert-success position-fixed animated slideInRight" style="top:5px;right:5px">
            felicitation '.$_POST['register_prenom'].' !</br>Vous pouvez vous 
            <a href="index.php">connecter</a> avec votre </br> username :<b>'.$_POST['register_username'].'</b> </br> et votre mot de passe.</div>';
        }else{
            echo'<div class="alert alert-warning position-fixed animated slideInRight" style="top:5px;right:5px"> erreur lors de l\'ajout de l\'utilisateur</div>';
        }
        }
    }
?>
</body>
</html>