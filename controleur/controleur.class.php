<?php
require_once("modele/modele.class.php");

class Controleur
{
    private $unModele;

    public function __construct($server, $bdd, $user, $mdp)
    {
        $this->unModele = new Modele($server, $bdd, $user, $mdp);
    }
    public function getTable()
    {
        return $this->unModele->getTable();
    }
    public function setTable($uneTable)
    {
        $this->unModele->setTable($uneTable);
    }
    public function selectAll($tab)
    {
        return $this->unModele->selectAll($tab);
    }
    public function insert($tab)
    {
        $this->unModele->insert($tab);
    }
    public function delete($tab)
    {
        $this->unModele->delete($tab);
    }
    public function selectWhere($tab, $where  )
    {
        return $this->unModele->selectWhere($tab, $where );
    }
    public function update($tab, $where)
    {
        $this->unModele->update($tab, $where);
    }
    public function selectLike($tab, $mot)
    {
        return $this->unModele->selectLike($tab, $mot);
    }

    public function verifConnexion(mixed $email, mixed $mdp)
    {
        return $this->unModele->verifConnexion($email, $mdp);
    }
}
