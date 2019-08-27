<html>
     <?php session_start();

        if(!isset($_SESSION['is_authenticated']) or $_SESSION['is_authenticated'] == false ){
            header("Location: http://localhost/IMEN/index.php");
        }else{


     require 'dataManager/data_base.php';
     ?>
     <head>
         <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"
               id="bootstrap-css">
         <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" rel="stylesheet">
         <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
         <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

         <!------ Include the above in your HEAD tag ---------->
         <style>

         </style>
     </head>

     <body class="container-fluid ">

     <div class=" container col-lg-8 mx-auto " style="margin-bottom:20vh">
         <h1 class="display-4 text-center col-12"> Ordre de mission</h1>
         <button class="btn btn-outline-danger position-fixed" id="logout" style="right:5px;top:5px" >Déconnexion</button>
         <?php if (!isset($_POST['form_submitted'])) { ?>
             <form class="col mr-auto needs-validation animated fadeInRight" method="POST" action="#" novalidate>

                 <!-- NOM-->
                 <div class="form-row col-12">
                     <div class="form-group col-md-5 mr-auto">
                         <label for="nom" class="col-md-2">
                             nom
                         </label>
                         <input type="text" id="nom" name="nom" class="form-control col-md-12" required>
                         <div class="invalid-tooltip">
                            Veuillez entrer votre nom
                         </div>
                     </div>
                     <!-- PRENOM -->
                     <div class="form-group col-md-5 mr-auto">
                         <label for="prenom" class="col-md-2">
                             prenom
                         </label>
                         <input type="text" id="prenom" name="prenom" class="form-control col-md-12" required>
                         <div class="invalid-tooltip">
                            Veuillez entrer votre prenom
                         </div>
                     </div>
                 </div>
                 <!-- NOMBRE DE NUIT -->
                 <div class="form-row px-3">
                     <div class="form-group col-md-5 mr-auto">
                         <label for="nbr_nuit">nbr de nuité</label>
                         <input type="number" name="nbr_nuit" class="form-control" id="nbr_nuit" value="0">

                     </div>
                     <!-- REGION -->
                     <div class="form-group col-md-5 mr-auto">

                         <label for="region"> dans la Region de </label>
                         <select class="form-control " id="region" name="region">
                             <option value="">Bizerte</option>
                             <option value="Tunis">Tunis</option>
                             <option value="Sfax">Sfax</option>
                             <option value="Bizerte">Bizerte</option>
                             <option value="Tunis">Tunis</option>
                             <option value="Sfax">Sfax</option>
                         </select>

                     </div>
                 </div>


                 <div class="form-row px-3">
                     <!-- DATE_DEPART -->
                     <div class="form-group col-md-5 mr-auto">
                         <label for="datedepart">Du</label>
                         <input type="date" class="form-control col-md-12" name="date_depart" id="date_depart" required>
                         <div class="invalid-tooltip">
                             une date de depart doit etre saisie
                         </div>
                     </div>
                     <!-- DATE_RETOUR -->
                     <div class="form-group col-md-5 mr-auto">
                         <label for="dateretour">Au</label>
                         <input type="date" class="form-control col-md-12" name="date_retour" id="date_retour" required>
                         <div class="invalid-tooltip">
                             une date d'arrivé doit etre saisie
                         </div>
                     </div>
                     <div class="invalid-tooltip">
                         une date de depart doit etre saisie
                     </div>
                 </div>
                 <!--MOTIF DE DEPLACEMENT -->
                 <div class="form-row p-3 ">
                     <div class="form-group col-md-5 mr-auto ">
                         <label for="motif_deplacement">Motif de deplacement</label>
                         <select class="form-control col-md-12" id="motif_deplacement" name="motif_deplacement"
                                 required>
                             <option value="---">---</option>
                             <option value="Installation">Installation</option>
                             <option value="affaire">affaire</option>
                             <option value="autre">Autre</option>

                         </select>
                         <div class="invalid-tooltip">
                             une date d'arrivé doit etre saisie
                         </div>
                     </div>

                     <!-- MOYEN DE TRANSPORT -->
                     <div class="form-group col-md-5 mr-auto">
                         <label for="moy_transport">Moyen de transport utilisé</label>
                         <select class="form-control col-md-12" id="moy_transport" name="moy_transport" required>
                             <option value="publique">publique</option>
                             <option value="prive">privé</option>

                         </select>

                     </div>
                 </div>
                 <!-- KILOMETRAGE -->
                 <div class="form-row">
                     <div class="input-group col-md-5 mb-5" >
                         <label for="km" class="col-md-4">km estimé</label>

                         <input type="number" name="km" id="km" class="form-control col-md-8" aria-label="Username"
                                aria-describedby="basic-addon1" >
                         <div class="input-group-prepend">
                             <span class="input-group-text" id="basic-addon1">Km</span>
                         </div>
                         <div class="valid-tooltip">
                             Ce champs n'est pas obligatoire
                         </div>
                     </div>
                 </div>

                 <div class="row">

                     <h2 style="font-weight: 100" class="col-12">Besoin</h2>
                     <!-- FRAIS -->
                     <div class="form-group col p-3">
                         <label for="frais" class="col">
                             Frais de mission
                         </label>
                         <input type="number" id="frais" name="frais" value="0" class="form-control col-md-10">

                     </div>
                     <!-- CARBURANT -->
                     <div class="form-group col-md-6 p-3">
                         <label for="carburant" class="col">
                             carburant
                         </label>
                         <input type="number" id="carburant" name="carburant" value="0" class="form-control col-md-10">

                     </div>


                         <!-- RECHARGE -->
                         <div class="form-group col-md-6 ">
                             <label for="recharge_autoroute" class="col">
                                 Recharge autoroute
                             </label>
                             <input type="number" id="recharge_autoroute" value="0" name="recharge_autoroute"
                                    class="form-control col-md-10">

                         </div>
                         <!-- HEBERGEMENT -->

                         <div class="form-group col-md-5 ">
                             <label for="transport " class="col">Hebergement</label>
                             <select class="form-control col-md-12" id="hebergement" name="hebergement">
                                 <option value="prive">pas d'hebergement</option>
                                 <option value="hotel">hotel</option>
                                 <option value="motel">Motel</option>
                             </select>
                         </div>



                     <!-- Observation -->

                     <div class="form-group col-md-12 p-3">
                         <label for="observation" class="col-md-2 ">Observation</label>
                         <textarea id="observation" name="observation" class="form-control col-md-8 " style="resize:none" placeholder=" Exprimez-vous"></textarea>
                     </div>
                 </div>
                 <div class="form-row">
                     <input type="submit" class="btn btn-outline-success col-5 m-3 " value="Enregistrer">
                     <input type="reset" class="btn btn-outline-secondary col-5 m-3" value="reset">

                     <input type="hidden" name="form_submitted" value="1">
                 </div>

             </form>
             <script>
                 // Example starter JavaScript for disabling form submissions if there are invalid fields
                 $('#logout').click( function(){
                         sessionStorage.clear();
                         window.location.replace("http://localhost/IMEN/index.php");


                 });
                 (function () {
                     'use strict';
                     window.addEventListener('load', function () {
                         // Fetch all the forms we want to apply custom Bootstrap validation styles to
                         var forms = document.getElementsByClassName('needs-validation');
                         // Loop over them and prevent submission
                         var validation = Array.prototype.filter.call(forms, function (form) {
                             form.addEventListener('submit', function (event) {
                                 if (form.checkValidity() === false) {
                                     event.preventDefault();
                                     event.stopPropagation();
                                 }
                                 form.classList.add('was-validated');
                             }, false);
                         });
                     }, false);
                 })();
             </script>
         <?php }?>
         <script>
             $('#logout').click( function(){
                 sessionStorage.clear();
                 window.location.replace("http://localhost/IMEN/index.php");


             });
         </script><?php
         if (isset($_POST['form_submitted'])) {

             $date_depart = $_POST['date_depart'];
             $date_retour = $_POST['date_retour'];

             $real_depart = date("Y-m-d H:i:s", strtotime($date_depart));
             $real_retour = date("Y-m-d H:i:s", strtotime($date_retour));
/*
             echo '<div class="list-group col-12">';
             echo '<div class="list-group-item">nom: ' . $_POST['nom'] . '</div>';
             echo '<div class="list-group-item">prenom: ' . $_POST['prenom'] . '</div>';
             echo '<div class="list-group-item">nbr_nuit: ' . $_POST['nbr_nuit'] . '</div>';
             echo '<div class="list-group-item">region: ' . $_POST['region'] . '</div>';
             echo '<div class="list-group-item">date_depart: ' . $_POST['date_depart'] . ' </div>';
             echo '<div class="list-group-item">date_retour: ' . $_POST['date_retour'] . '</div>';
             echo '<div class="list-group-item">motif_deplacement: ' . $_POST['motif_deplacement'] . '</div>';
             echo '<div class="list-group-item">moy_transport: ' . $_POST['moy_transport'] . '</div>';
             echo '<div class="list-group-item">Km: ' . $_POST['km'] . '</div>';
             echo '<div class="list-group-item">frais : ' . $_POST['frais'] . '</div>';
             echo '<div class="list-group-item">carburant : ' . $_POST['carburant'] . '</div>';
             echo '<div class="list-group-item">recharge_autoroute : ' . $_POST['recharge_autoroute'] . '</div>';
             echo '<div class="list-group-item">hebergement : ' . $_POST['hebergement'] . '</div>';
             echo '<div class="list-group-item">observation : ' . $_POST['observation'] . '</div>';
             echo '</div>';
*/

             $newOrdre = new Ordre([
                 'nom' => $_POST['nom'],
                 'prenom' => $_POST['prenom'],
                 'nbrNuit' => (int)$_POST['nbr_nuit'],
                 'region' => $_POST['region'],
                 'datedepart' => $real_depart,
                 'dateretour' => $real_retour,
                 'motifdeplacement' => $_POST['motif_deplacement'],
                 'moytransport' => $_POST['moy_transport'],
                 'kilometrage' => (int)$_POST['km'],
                 'frais' => (float)$_POST['frais'],
                 'carburant' => (float)$_POST['carburant'],
                 'rechargeautoroute' => (float)$_POST['recharge_autoroute'],
                 'hebergement' => $_POST['hebergement'],
                 'observation' => $_POST['observation'],
             ]);


             $conn = new PDO("mysql:host=localhost", "root", '');
             $manager = new ordreManager($conn);
             if ($manager->add($newOrdre)) {
                 echo '<div class=" offset-md-3 alert alert-success position-absolute animated slideInDown" style="top:30vh; z-index: 3">
                                Ordre ajouté avec success . </br> 
                               
                         <span class="display-4">Ordre N° : '.$conn->lastInsertId().' </span></br>
                                    
                                ';


             } else {
                 echo '<div class="alert alert-warning"> erreur lors de l\'insertion </div>';
             }


         }

    ?>
        </div>

    </body>
<?php } ?>
</html>
