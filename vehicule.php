<?php
if (isset($_SESSION['email'])){
    if (isset($_SESSION['droits']) && $_SESSION['droits'] == "admin") {
// SET TABLE MONITEUR
        $unControleur->setTable("moniteur");
        $lesMoniteurs = $unControleur->selectAll(array("idmoniteur", "nomMoniteur", "prenomMoniteur"));

// SET TABLE VEHICULE
        $unControleur->setTable("vehicule");

        $leVehicule = null;
        if (isset($_GET['action']) && isset($_GET['idvehicule'])) {
            $action = $_GET['action'];
            $idvehicule = $_GET['idvehicule'];

            switch ($action) {
                case 'sup':
                    $tab = array("idvehicule" => $idvehicule);
                    $unControleur->delete($tab);
                    break;
                case "edit":
                    $tab = array("*");
                    $where = array("idvehicule" => $idvehicule);
                    $leVehicule = $unControleur->selectWhere($tab, $where);
                    break;
                default;
            }
        }

// EDIT
        require_once("vue/vue_insert_vehicule.php");
        if (isset($_POST['modifier'])) {
            $tab = array(
                "nomVehicule" => $_POST['nomVehicule'],
                "typeVehicule" => $_POST['typeVehicule'],
                "anneeVehicule" => $_POST['anneeVehicule'],
                "numImmatriculation" => $_POST['numImmatriculation'],
                "nbKilometre" => $_POST['nbKilometre'],
                "typeConso" => $_POST['typeConso'],
                "puissance" => $_POST['puissance'],
                "idmoniteur" => $_POST['idmoniteur']
            );
            $where = array(
                "idvehicule" => $_POST['idvehicule']
            );
            $unControleur->update($tab, $where);
            header("Location: index.php?page=4");
        }
// INSERT
        require_once("vue/vue_insert_vehicule.php");
        if (isset($_POST['valider'])) {
            $tab = array(
                "nomVehicule" => $_POST['nomVehicule'],
                "typeVehicule" => $_POST['typeVehicule'],
                "anneeVehicule" => $_POST['anneeVehicule'],
                "numImmatriculation" => $_POST['numImmatriculation'],
                "nbKilometre" => $_POST['nbKilometre'],
                "typeConso" => $_POST['typeConso'],
                "puissance" => $_POST['puissance'],
                "idmoniteur" => $_POST['idmoniteur']
            );
            $unControleur->setTable("vehicule");
            $unControleur->insert($tab);
        }

        $unControleur->setTable("lesVehicules");
        $lesVehicules = $unControleur->selectAll(array("*"));
        require_once("vue/vue_les_vehicules.php");
    }else{
        require_once('vue/vue_error_permission.php');
    }
}
?>