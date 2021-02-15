<?php
if (isset($_SESSION['email'])){
    if (isset($_SESSION['droits']) && $_SESSION['droits'] == "admin") {
// SET TABLE
        $unControleur->setTable("moniteur");

        $leMoniteur = null;
        if (isset($_GET['action']) && isset($_GET['idmoniteur'])) {
            $action = $_GET['action'];
            $idmoniteur = $_GET['idmoniteur'];

            switch ($action) {
                case 'sup':
                    $tab = array("idmoniteur" => $idmoniteur);
                    $unControleur->delete($tab);
                    break;
                case "edit":
                    $tab = array("*");
                    $where = array("idmoniteur" => $idmoniteur);
                    $leMoniteur = $unControleur->selectWhere($tab, $where);
                    break;
                default;
            }
        }
// EDIT
        require_once("vue/vue_insert_moniteurs.php");
        if (isset($_POST['modifier'])) {
            $tab = array(
                "nomMoniteur" => $_POST['nomMoniteur'],
                "prenomMoniteur" => $_POST['prenomMoniteur'],
                "typeMoniteur" => $_POST['typeMoniteur'],
                "dateEmbauche" => $_POST['dateEmbauche']
            );
            $where = array("idmoniteur" => $_POST['idmoniteur']);
            $unControleur->update($tab, $where);
            header("Location: index.php?page=3");
        }
// INSERT
        require_once("vue/vue_insert_moniteurs.php");
        if (isset($_POST['valider'])) {
            $tab = array(
                "nomMoniteur" => $_POST['nomMoniteur'],
                "prenomMoniteur" => $_POST['prenomMoniteur'],
                "typeMoniteur" => $_POST['typeMoniteur'],
                "dateEmbauche" => $_POST['dateEmbauche']
            );
            $unControleur->insert($tab);
        }
// SEARCH
        if (isset($_POST['ok'])) {
            $tab = array("nomMoniteur", "prenomMoniteur");
            $lesMoniteurs = $unControleur->selectLike($tab, $_POST['mot']);
        } else {

            $lesMoniteurs = $unControleur->selectAll(array("*"));
        }
        require_once("vue/vue_les_moniteurs.php");
    } else {
        require_once('vue/vue_error_permission.php');
    }
}
?>