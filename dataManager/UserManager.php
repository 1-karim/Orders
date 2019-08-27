<?php
require'User.php';

class UserManager
{
    private $_db; // Instance de PDO

    public function __construct($db)
    {
        // initialise la bd
        $this->setDb($db);
    }


    //fonction qui ajoute un obj de type User(voir User.php) a la BD TIAMED ,dans la table users
    public function add( User $user)
    {

        // Préparation de la requête d'insertion.

        $addReq = $this->_db->prepare('INSERT INTO TIAMED.users (
        nom,
        prenom,
        username,
        password,
        role)
         VALUES (
        :nom,
        :prenom,
        :username,
        :password,
        :role)');

        // Assignation des valeurs pour l'ordre.
        $addReq->bindValue(':nom',$user->getNom());
        $addReq->bindValue(':prenom',$user->getPrenom());
        $addReq->bindValue(':password',$user->getPassword());
        $addReq->bindValue(':username',$user->getUsername());
        $addReq->bindValue(':role',$user->getRole());

        // Exécution de la requête.

        return $addReq->execute();

    }


  //function qui cherche un utilisateur avec les coordonnées ($username et $password) , renvoie TRUE si il le trouve
    public function login($username,$password){

        $q = $this->_db->prepare('SELECT COUNT(*) FROM TIAMED.users WHERE username = :username and 
                                                                          password = :password');


        $q->bindValue(':username', $username);
        $q->bindValue(':password', $password);

        $resultat = $q->execute();
        return ($q->fetch()[0] == 1);
    }



    //initialize la bd pour le manager
    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }


}
?>