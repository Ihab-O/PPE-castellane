<?php
if (isset($_SESSION['email'])){
    if (isset($_SESSION['droits']) && $_SESSION['droits'] == "admin") {
// SET TABLE ETUDIANT
        $unControleur->setTable("etudiant");
        $lesEtudiants = $unControleur->selectAll(array("idetudiant", "nomEtudiant", "prenomEtudiant"));

// SET TABLE EXAMEN
        $unControleur->setTable("examen");

        $leExamen = null;
        if (isset($_GET['action']) && isset($_GET['idexamen'])) {
            $action = $_GET['action'];
            $idexamen = $_GET['idexamen'];

            switch ($action) {
                case 'sup':
                    $tab = array("idexamen" => $idexamen);
                    $unControleur->delete($tab);
                    break;
                case "edit":
                    $tab = array("*");
                    $where = array("idexamen" => $idexamen);
                    $leExamen = $unControleur->selectWhere($tab, $where);
                    break;
                default;
            }
        }
// EDIT
        require_once("vue/vue_insert_examen.php");
        if (isset($_POST['modifier'])) {
            $tab = array(
                "typeExamen" => $_POST['typeExamen'],
                "dateExamen" => $_POST['dateExamen'],
                "heureExamen" => $_POST['heureExamen'],
                "resultatExamen" => $_POST['resultatExamen'],
                "idetudiant" => $_POST['idetudiant']
            );
            $where = array(
                "idexamen" => $_POST['idexamen']
            );
            $unControleur->update($tab, $where);
            header("Location: index.php?page=7");
        }
// INSERT
        require_once("vue/vue_insert_examen.php");
        if (isset($_POST['valider'])) {
            $tab = array(
                "typeExamen" => $_POST['typeExamen'],
                "dateExamen" => $_POST['dateExamen'],
                "heureExamen" => $_POST['heureExamen'],
                "resultatExamen" => $_POST['resultatExamen'],
                "idetudiant" => $_POST['idetudiant']
            );
            $unControleur->setTable("examen");
            $unControleur->insert($tab);
        }

        $unControleur->setTable("lesExamens");
        $lesExamens = $unControleur->selectAll(array("*"));
        require_once("vue/vue_les_examens.php");
    }else{
    require_once('vue/vue_error_permission.php');
    }
}
?>