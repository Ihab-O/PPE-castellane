<?php
if (isset($_SESSION['email'])){
    if (isset($_SESSION['droits']) && $_SESSION['droits'] == "moniteur" || $_SESSION['droits'] == "admin") {
// SET TABLE
        $unControleur->setTable("cours");

        $leCours = null;
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
                    $leCours = $unControleur->selectWhere($tab, $where);
                    break;
                default;
            }
        }
// EDIT
        require_once("vue/vue_insert_cours.php");
        if (isset($_POST['modifier'])) {
            $tab = array(
                "idcours" => $_POST['idcours'],
                "dateCours" => $_POST['dateCours'],
                "heureCours" => $_POST['heureCours'],
                "tarifHeure" => $_POST['tarifHeure']
            );
            $where = array("idcours" => $_POST['idcours']);
            $unControleur->update($tab, $where);
            header("Location: index.php?page=5");
        }
// INSERT
        if (isset($_POST['valider'])) {
            $tab = array(
                "dateCours" => $_POST['dateCours'],
                "heureCours" => $_POST['heureCours'],
                "tarifHeure" => $_POST['tarifHeure']
            );
            $unControleur->insert($tab);
        }

        $lesCours = $unControleur->selectAll(array("*"));
        require_once("vue/vue_les_cours.php");
    }else{
        require_once('vue/vue_error_permission.php');
    }
}
?>