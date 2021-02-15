<?php

class Modele
{
    private $unPdo, $uneTable;

    public function __construct($server, $bdd, $user, $mdp)
    {
        $this->unPdo = null;
        $this->uneTable = "";
        try {
            $this->unPdo = new PDO("mysql:host=" . $server . ";dbname=" . $bdd, $user, $mdp);
        } catch (PDOException $e) {
            echo "</br>" . "Erreur de la connexion à la BDD" . $e;
        }
    }
    public function getTable()
    {
        return $this->uneTable;
    }
    public function setTable($uneTable)
    {
        $this->uneTable = $uneTable;
    }
    public function selectAll($tab)
    {
        if ($this->unPdo != null) {
            $chaine = implode(",", $tab);

            $requete = " select " . $chaine . " from " . $this->uneTable . " ; ";
            $select = $this->unPdo->prepare($requete);
            $select->execute();
            return $select->fetchAll();
        } else {
            return 0;
        }
    }
    public function insert($tab)
    {
        if ($this->unPdo != null) {
            $listeValeurs = array();
            $listeChamps = array();
            $donnees = array();

            foreach ($tab as $cle => $valeur) {
                $listeChamps[] = $cle;
                $listeValeurs[] = ":" . $cle;
                $donnees[":" . $cle] = $valeur;
            }
            $chaineChamps = implode(",", $listeChamps);
            $chaineValeurs = implode(",", $listeValeurs);
            $requete = " insert into " . $this->uneTable . "(" . $chaineChamps . ")" . " values (" . $chaineValeurs . ");";

            $insert = $this->unPdo->prepare($requete);
            $insert->execute($donnees);
        }
    }
    public function delete($tab)
    {
        if ($this->unPdo != null) {
            $listeChamps = array();
            $donnees = array();
            foreach ($tab as $cle => $valeur) {
                $listeChamps[] = $cle . "=" . ":" . $cle;
                $donnees[":" . $cle] = $valeur;
            }
            $chaineChamps = implode(" AND ", $listeChamps);

            $requete = " DELETE FROM " . $this->uneTable . " WHERE " . $chaineChamps . ";";

            $delete = $this->unPdo->prepare($requete);
            $delete->execute($donnees);
        }
    }
    public function selectWhere($tab, $where)
    {
        if ($this->unPdo != null) {
            $chaine = implode(",", $tab);
            $listeChamps = array();
            $donnees = array();
            foreach ($where as $cle => $valeur) {

                $listeChamps[] = $cle . "=" . ":" . $cle;
                $donnees[":" . $cle] = $valeur;
            }
            $chaineChamps = implode(" AND ", $listeChamps);
            $requete = "SELECT " . $chaine . " FROM " . $this->uneTable . " WHERE " . $chaineChamps . ";";
            $select = $this->unPdo->prepare($requete);
            $select->execute($donnees);
            return $select->fetch();
        } else {
            return null;
        }
    }
    public function update($tab, $where)
    {
        if ($this->unPdo != null) {
            $listeChamps = array();
            $listeValeurs = array();
            $donnees = array();
            foreach ($tab as $cle => $valeur) {
                $listeValeurs[] = $cle . "=" . ":" . $cle;
                $donnees[":" . $cle] = $valeur;
            }
            foreach ($where as $cle => $valeur) {
                $listeChamps[] = $cle . "=" . ":" . $cle;
                $donnees[":" . $cle] = $valeur;
            }
            $chaineChamps = implode(" and ", $listeChamps);
            $chaineValeurs = implode(", ", $listeValeurs);
            $requete = "update " . $this->uneTable . " set " . $chaineValeurs . " where " . $chaineChamps . ";";
            $update = $this->unPdo->prepare($requete);
            $update->execute($donnees);
        }
    }
    public function selectLike($tab, $mot)
    {
        if ($this->unPdo != null) {
            $listeChamps = array();
            foreach ($tab as $valeur) {
                $listeChamps[] = $valeur . " Like " . ":mot";
            }
            $chaineChamps = implode(" or ", $listeChamps);
            $donnees = array(":mot" => "%" . $mot . "%");
            $requete = " select * from " . $this->uneTable . " where " . $chaineChamps;
            $select = $this->unPdo->prepare($requete);
            $select->execute($donnees);
            return $select->fetchAll();
        } else {
            return 0;
        }
    }

    public function verifConnexion($email, $mdp)
    {
        if ($this->unPdo != null)
        {
            $requete = "select * from utilisateur where email = :email and mdp = :mdp; ";

            $donnees = array (":email"=>$email, ":mdp"=>$mdp) ;

            $select = $this->unPdo->prepare($requete);
            $select->execute ($donnees);
            return $select->fetch();
        }else {
            return null;
        }
    }
}
