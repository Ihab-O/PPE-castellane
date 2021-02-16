<br>
<?php
if (isset($_SESSION['email'])) {
    if (isset($_SESSION['droits']) && $_SESSION['droits'] == "etudiant") {
        echo '<h3> Mes cours </h3>';
        } else {
        echo '<h3> Liste des cours </h3>';
    }
}
?>
<br>
<table border="1" class="table table-dark">
    <tr>
        <td> Date du Cours </td>
        <td> Nombres d'heures Cours </td>
        <td> Prix </td>
        <td> Nom et prénom de l'étudiant </td>
        <td> N° téléphone Étudiant </td>
        <td> Nom et prénom du moniteur </td>
        <td> Type du Cours </td>
        <?php
        if (isset($_SESSION['droits']) && $_SESSION['droits'] == "admin" || $_SESSION['droits'] == "moniteur") {
            echo "<td> Opérations </td>";
        }
        ?>
    </tr>
    <?php
    foreach ($lePlanning as $unPlanning) {
        echo " <tr>
                <td> ". $unPlanning['dateCours']."</td>
                <td> ". $unPlanning['heureCours']. " <span>H</span></td>
                <td> ". $unPlanning['tarifHeure']." <b>€</b> </td>
                <td> ". $unPlanning['nomEtudiant']." ".$unPlanning['prenomEtudiant']."</td>
                <td> ". $unPlanning['telephone']."</td>
                <td> ". $unPlanning['nomMoniteur']." ".$unPlanning['prenomMoniteur']."</td>
                <td> ". $unPlanning['typeMoniteur']."</td>";
                if (isset($_SESSION['droits']) && $_SESSION['droits'] == "admin" || $_SESSION['droits'] == "moniteur"){
                echo "<td>
                        <a href='index.php?page=6&action=sup&idcours=".$unPlanning['idcours']."'> X </a>
                        <a href='index.php?page=6&action=edit&idcours=".$unPlanning['idcours']."'> E </a>
                      </td>";
                }
                echo '</tr>';
    }
    ?>
</table>