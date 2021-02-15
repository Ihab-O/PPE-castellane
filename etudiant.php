<?php
if (isset($_SESSION['email'])){
    if (isset($_SESSION['droits']) && $_SESSION['droits'] == "moniteur" || $_SESSION['droits'] == "admin") {
// SET TABLE
        $unControleur->setTable("etudiant");

        $leEtudiant = null;
        if (isset($_GET['action']) && isset($_GET['idetudiant'])) {
            $action = $_GET['action'];
            $idetudiant = $_GET['idetudiant'];

            switch ($action) {
                case 'sup':
                    $tab = array("idetudiant" => $idetudiant);
                    $unControleur->delete($tab);
                    break;
                case "edit":
                    $tab = array("*");
                    $where = array("idetudiant" => $idetudiant);
                    $leEtudiant = $unControleur->selectWhere($tab, $where);
                    break;
                default;
            }
        }
// EDIT
        require_once("vue/vue_insert_etudiants.php");
        if (isset($_POST['modifier'])) {
            $tab = array(
                "nomEtudiant" => $_POST['nomEtudiant'],
                "prenomEtudiant" => $_POST['prenomEtudiant'],
                "dateNaissance" => $_POST['dateNaissance'],
                "telephone" => $_POST['telephone'],
                "adresseEtudiant" => $_POST['adresseEtudiant'],
                "niveauxEtudes" => $_POST['niveauxEtudes'],
                "reduction" => $_POST['reduction']
            );
            $where = array("idetudiant" => $_POST['idetudiant']);
            $unControleur->update($tab, $where);
            header("Location: index.php?page=2");
        }
// INSERT
        if (isset($_POST['valider'])) {
            $tab = array(
                "nomEtudiant" => $_POST['nomEtudiant'],
                "prenomEtudiant" => $_POST['prenomEtudiant'],
                "dateNaissance" => $_POST['dateNaissance'],
                "telephone" => $_POST['telephone'],
                "adresseEtudiant" => $_POST['adresseEtudiant'],
                "niveauxEtudes" => $_POST['niveauxEtudes'],
                "reduction" => $_POST['reduction']
            );
            $unControleur->insert($tab);
        }
// SEARCH
        if (isset($_POST['ok'])) {
            $tab = array("nomEtudiant", "prenomEtudiant");
            $lesEtudiants = $unControleur->selectLike($tab, $_POST['mot']);
        } else {

            $lesEtudiants = $unControleur->selectAll(array("*"));
        }

        require_once("vue/vue_les_etudiants.php");
    }else{
    require_once('vue/vue_error_permission.php');
    }
}
?>