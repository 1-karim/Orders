<?php



class Ordre {
   
    protected
                $_id,
                $_nom,
                $_prenom,
                $_nbrNuit,
                $_region,
                $_date_depart,
                $_date_retour,
                $_motif_deplacement,
                $_moy_transport,
                $_kilometrage,
                $_frais,
                $_carburant,
                $_recharge_autoroute,
                $_hebergement,
                $_observation;


    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);

    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $attribut => $value)
        {
            $method = 'set'.ucfirst($attribut);

            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }




    public function getId()
    {
        return $this->_id;
    }
    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->_nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->_prenom;
    }

    /**
     * @return mixed
     */
    public function getNbrNuit()
    {
        return $this->_nbrNuit;
    }

    /**
     * @return mixed
     */
    public function getRegion()
    {
        return $this->_region;
    }

    /**
     * @return mixed
     */
    public function getDateDepart()
    {
        return $this->_date_depart;
    }

    /**
     * @return mixed
     */
    public function getDateRetour()
    {
        return $this->_date_retour;
    }

    /**
     * @return mixed
     */
    public function getMotifDeplacement()
    {
        return $this->_motif_deplacement;
    }

    /**
     * @return mixed
     */
    public function getMoyTransport()
    {
        return $this->_moy_transport;
    }

    /**
     * @return mixed
     */
    public function getKilometrage()
    {
        return $this->_kilometrage;
    }

    /**
     * @return mixed
     */
    public function getFrais()
    {
        return $this->_frais;
    }

    /**
     * @return mixed
     */
    public function getCarburant()
    {
        return $this->_carburant;
    }

    /**
     * @return mixed
     */
    public function getRechargeAutoroute()
    {
        return $this->_recharge_autoroute;
    }

    /**
     * @return mixed
     */
    public function getHebergement()
    {
        return $this->_hebergement;
    }

    /**
     * @return mixed
     */
    public function getObservation()
    {
        return $this->_observation;
    }
     
  
    


    
  

    
    // SETTERS


    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->_id = (int)$id;
    }
     public function setNom($nom){
         $this->_nom = $nom;
     }
    
    public function setPrenom($prenom){
     $this->_prenom = $prenom;
    }
    
   
    
     public function setNbrnuit($nbrNuit){
     $this->_nbrNuit= $nbrNuit;
    }
     public function setRegion($region){
     $this->_region =  $region;
    }
     public function setDatedepart($date_depart){
     $this->_date_depart =  $date_depart;
    }
     public function setDateretour($date_retour){
     $this->_date_retour =  $date_retour;
    }
    public function setMotifdeplacement($motifDeplacement){
        $this->_motif_deplacement = $motifDeplacement;
    }
    public function setMoytransport($moyTransport){
        $this->_moy_transport = $moyTransport;
    }
    public function setKilometrage($km){
        $this->_kilometrage = (int)$km;
    }
    public function setFrais($frais){
        $this->_frais = (float)$frais;
    }
    public function setCarburant($carburant){
        $this->_carburant = (float)$carburant;
    }
    public function setRechargeautoroute($recharge_autoroute){
        $this->_recharge_autoroute = (float)$recharge_autoroute;
    }
    public function setHebergement($hebergement){
        $this->_hebergement = $hebergement;
    }
    public function setObservation($observation){
        $this->_observation =$observation;
    }
                
               
               
    
    
    
    
    // ------ zeroes.v2 updates -------
}





  

?>

