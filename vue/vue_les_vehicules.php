<br>
<h3> Liste des véhicules </h3>
<br>
<table border="1" class="table table-dark">
    <tr>
        <td> Nom Vehicule </td>
        <td> Type de Vehicule </td>
        <td> Date d'achat </td>
        <td> N° immatriculation </td>
        <td> Nombres Kilometres </td>
        <td> Type de consommation </td>
        <td> Puissance </td>
        <td> prenom Moniteur </td>
        <td> nom Moniteur </td>
        <td> Opération </td>
    </tr>

    <?php
    foreach ($lesVehicules as $unVehicule) {
        echo "<tr>
                <td> " . $unVehicule['nomVehicule'] . "</td>
                <td> " . $unVehicule['typeVehicule'] . "</td>
                <td> " . $unVehicule['anneeVehicule'] . "</td>
                <td> " . $unVehicule['numImmatriculation'] . "</td>
                <td> " . $unVehicule['nbKilometre'] . "</td>
                <td> " . $unVehicule['typeConso'] . "</td>
                <td> " . $unVehicule['puissance'] . "</td>
                <td> " . $unVehicule['prenomMoniteur'] . "</td>
                <td> " . $unVehicule['nomMoniteur'] . "</td>
                <td>
                    <a href='index.php?page=4&action=sup&idvehicule=" . $unVehicule['idvehicule'] . "'> X </a>
                    <a href='index.php?page=4&action=edit&idvehicule=" . $unVehicule['idvehicule'] . "'> E </a>
                </td>
                </tr>
                ";
    }
    ?>
</table>