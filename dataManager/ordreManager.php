<?php
require'ordre.php';

class OrdreManager
{
  private $_db; // Instance de PDO
  
  public function __construct($db)
  {
    $this->setDb($db);
  }


  //Fonction qui ajoute un objet de type Ordre (voir ordre.php) a la base BD
  public function add(Ordre $ordre)
  {
     
      // Préparation de la requête d'insertion.


        $addReq = $this->_db->prepare('INSERT INTO TIAMED.ordres (
        nom,
        prenom,
        nbr_nuit,
        region,
        date_depart,
        date_retour,
        motif_deplacement,
        moy_transport,
        kilometrage,
        frais_mission,
        carburant,
        recharge_autoroute,
        hebergement,
        observation)
         VALUES (
        :nom,
        :prenom,
        :nbr_nuit,
        :region,
        :date_depart,
        :date_retour,
        :motif_deplacement,
        :moy_transport,
        :kilometrage,
        :frais_mission,
        :carburant,
        :recharge_autoroute,
        :hebergement,
        :observation)');

      // Assignation des valeurs pour l'ordre.
        $addReq->bindValue(':nom',$ordre->getNom());
        $addReq->bindValue(':prenom',$ordre->getPrenom());
        $addReq->bindValue(':nbr_nuit',$ordre->getNbrNuit());
        $addReq->bindValue(':region',$ordre->getRegion());
        $addReq->bindValue(':date_depart',$ordre->getDateDepart());
        $addReq->bindValue(':date_retour',$ordre->getDateRetour());
        $addReq->bindValue(':motif_deplacement',$ordre->getMotifDeplacement());
        $addReq->bindValue(':moy_transport',$ordre->getMoyTransport());
        $addReq->bindValue(':kilometrage',$ordre->getKilometrage());
        $addReq->bindValue(':frais_mission',$ordre->getFrais());
        $addReq->bindValue(':carburant',$ordre->getCarburant());
        $addReq->bindValue(':recharge_autoroute',$ordre->getRechargeAutoroute());
        $addReq->bindValue(':hebergement',$ordre->getHebergement());
        $addReq->bindValue(':observation',$ordre->getObservation());


      // Exécution de la requête.

           return $addReq->execute();

  }
    








  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
 
}
?>