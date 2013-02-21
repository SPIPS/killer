<?php
include("_config.php");
class Mlogin extends CI_Model {
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function inscription_membre($u)
    {
        $PDO = connectDatabase();
        $req = $PDO->prepare("INSERT INTO spips_killer(prenom, nom, email, password, photo, code, mot_de_passe, nb_kill) VALUES 
            (:prenom, :nom, :email, :password, :photo, :code, :mot_de_passe, 0)");        
        $array = array('prenom' => $u["prenom"], 'nom' => $u["nom"], 'email' => $u["email"], 'password' => $u["password"], 
            'photo' => $u["photo"], 'code' => rand(1000,9999), 'mot_de_passe' => $u["mot_de_passe"]);
        $result = $req->execute($array) or die(print_r($req->errorInfo()));
        $req->closeCursor();
        return $result;
    }
    
    function login_membre($u)
    {
        $PDO = connectDatabase();
        $req = $PDO->prepare("SELECT * FROM spips_killer WHERE email = :email AND password = :password");        
        $array = array('email' => $u["email"], 'password' => $u["password"]);
        $req->execute($array) or die(print_r($req->errorInfo()));
        $result = $req->fetch();
        $req->closeCursor();
        return $result;
    }
    
    function get_membre_infos($u)
    {
        $PDO = connectDatabase();
        $req = $PDO->prepare("SELECT * FROM spips_killer WHERE id = :id");        
        $array = array('id' => $u);
        $req->execute($array) or die(print_r($req->errorInfo()));
        $result = $req->fetch();
        $req->closeCursor();
        $req = $PDO->prepare("SELECT * FROM spips_killer_dead WHERE id = :id");        
        $array = array('id' => $u);
        $req->execute($array) or die(print_r($req->errorInfo()));
        $result = $req->fetch();
        $req->closeCursor();
        $req = $PDO->prepare("SELECT * FROM spips_killer WHERE id = :id");        
        $array = array('id' => $u);
        $req->execute($array) or die(print_r($req->errorInfo()));
        $result = $req->fetch();
        $req->closeCursor();
        return $result;
    }

    /*
1   id  int(10)     UNSIGNED ZEROFILL   Non Aucune  AUTO_INCREMENT           plus 
     2  prenom  varchar(255)    latin1_general_ci       Non Aucune               plus 
     3  nom varchar(255)    latin1_general_ci       Non Aucune               plus 
     4  email   varchar(255)    latin1_general_ci       Non Aucune               plus 
     5  password    varchar(255)    latin1_general_ci       Non Aucune               plus 
     6  photo   varchar(255)    latin1_general_ci       Non Aucune               plus 
     7  code    varchar(4)  latin1_general_ci       Non Aucune               plus 
     8  mot_de_passe    varchar(255)    latin1_general_ci       Non Aucune               plus 
     9  nb_kill
    */

}
