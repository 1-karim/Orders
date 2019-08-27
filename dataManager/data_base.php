 <?php
 require 'ordreManager.php';
 require 'UserManager.php';
/*
              ╔══════════════════════════════════╗

                            init BD

              ╚══════════════════════════════════╝
    
*/

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "TIAMED";
    $tablename = "ordres";


try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //set requete;
    $createDB = "CREATE DATABASE  IF NOT EXISTS ".$dbname;
    // use exec() because no results are returned
    $conn->exec($createDB);
    //success message //
    echo "<script>console.log( 'base de données ".$dbname." prete !' );</script>";
    
    }
catch(PDOException $e)
    {
        //affichage de l'erreur
        echo '<span class="col-lg-6 offset-lg-3 display-3">'.$e->getMessage().'</span>';
    }
   


//CREATION DE LA TABLE 'ordres' si elle n'existe pas
    try{
        
         $createT = "CREATE TABLE IF NOT EXISTS TIAMED.ordres (
              `id` int(6) UNSIGNED AUTO_INCREMENT  PRIMARY KEY,
              `nom`  varchar(80)  ,
              `prenom`  varchar(80)  ,
              `nbr_nuit` int(11) ,
              `region` varchar(50)  ,
              `date_depart` datetime  ,
              `date_retour` datetime,
              `motif_deplacement` varchar(100),
              `moy_transport` varchar(100)  ,
              `kilometrage` int(11) unsigned ,
              `frais_mission` float unsigned ,
              `carburant` float unsigned ,
              `recharge_autoroute` float ,
              `hebergement` varchar(120) ,
              `observation` text(200))
             ";
        
       $conn->exec($createT);
         echo "<script>console.log( 'table : ".$tablename." prete !' );</script>";
        }
    catch(PDOException $e){
            echo $e->getMessage();
     }
     //CREATION DE LA TABLE 'users' si elle n'existe pas
     try{

         $createU = "CREATE TABLE IF NOT EXISTS TIAMED.users (
                  `id` int(6) UNSIGNED AUTO_INCREMENT  PRIMARY KEY,
                  `nom`  varchar(80)  ,
                  `prenom`  varchar(80)  ,
                  `username`  varchar(80)  ,
                  `password`  varchar(80)  ,
                  `role`  varchar(80)  ,
                  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
                  )
                 ";

         $conn->exec($createU);
         echo "<script>console.log( 'table : users prete !' );</script>";
     }
     catch(PDOException $e){
         echo $e->getMessage();
     }
 ?>