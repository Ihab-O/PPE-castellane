<?php
if (isset($_SESSION['email'])) {
    if (isset($_SESSION['droits']) && $_SESSION['droits'] == "moniteur" || $_SESSION['droits'] == "admin") {
        $unControleur->setTable("etudiant");
        $lesEtudiants = $unControleur->selectAll(array("idetudiant", "nomEtudiant", "prenomEtudiant", "telephone"));

        $unControleur->setTable("moniteur");
        $lesMoniteurs = $unControleur->selectAll(array("idmoniteur", "nomMoniteur", "prenomMoniteur", "typeMoniteur"));

        $unControleur->setTable("cours");
        $lesCours = $unControleur->selectAll(array("idcours", "dateCours", "heureCours"));

        $lePlanning = null;
        if (isset($_GET['action']) && isset($_GET['idcours'])) {
            $action = $_GET['action'];
            $idcours = $_GET['idcours'];

            switch ($action) {
                case 'sup':
                    $tab = array("idcours" => $idcours);
                    $unControleur->delete($tab);
                    break;
                case "edit":
                    $tab = array("*");
                    $where = array("idcours" => $idcours);
                    $lePlanning = $unControleur->selectWhere($tab, $where);
                    break;
                default;
            }
        }
        $unControleur->setTable("planning");

        // EDIT
        require_once("vue/vue_insert_planning.php");
        if (isset($_POST['modifier'])) {
            $tab = array(
                "idetudiant" => $_POST['idetudiant'],
                "dateheuredebut" => 1,
                "idmoniteur" => $_POST['idmoniteur'],
                "idcours" => $_POST['idcours'],
                "dateheurefinetat" => date('Y-m-d')
            );
            $where = array("idcours" => $_POST['idcours']);
            $unControleur->update($tab, $where);
            header("Location: index.php?page=6");
        }
        if (isset($_POST['valider'])) {
            $tab = array(
                "idetudiant" => $_POST['idetudiant'],
                "dateheuredebut" => 1,
                "idmoniteur" => $_POST['idmoniteur'],
                "idcours" => $_POST['idcours'],
                "dateheurefinetat" => date('Y-m-d')
            );
            $unControleur->insert($tab);
        }
        $unControleur->setTable("LePlanning");
        $lePlanning = $unControleur->selectAll(array("*"));
        require_once("vue/vue_le_planning.php");

    } elseif (isset($_SESSION['email']) && isset($_SESSION['droits']) && $_SESSION['droits'] == "etudiant") {
        $unControleur->setTable("LePlanning");
        $lePlanning = $unControleur->selectAll(array("*"));
        require_once("vue/vue_le_planning.php");
    } else {
        require_once('vue/vue_error_permission.php');
    }
}
?>
