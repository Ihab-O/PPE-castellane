<br>
<h3> Insertion d'un Véhicule </h3>
<br>
<form method="post" action="">
    <table border="0" class="table table-dark">
        <tr>
            <td> Nom du vehicule </td>
            <td> <input type="text" placeholder="Nom du véhicule" name="nomVehicule" value="<?php echo ($leVehicule != null) ? $leVehicule['nomVehicule'] : ''; ?>">
            </td>
        </tr>
        <tr>
            <td> Type du vehicule </td>
            <td> <input type="text" placeholder="Type de véhicule" name="typeVehicule" value="<?php echo ($leVehicule != null) ? $leVehicule['typeVehicule'] : ''; ?>">
            </td>
        </tr>
        <tr>
            <td> Date d'achat </td>
            <td> <input type="date" placeholder="YYYY-MM-DD" pattern="(?:19|20)[0-9]{​​2}​​-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" name="anneeVehicule" value="<?php echo ($leVehicule != null) ? $leVehicule['anneeVehicule'] : ''; ?>">
            </td>
        </tr>
        <tr>
            <td> N° d'immatriculation </td>
            <td> <input type="text" placeholder="XXX-XXX-XXX" name="numImmatriculation" value="<?php echo ($leVehicule != null) ? $leVehicule['numImmatriculation'] : ''; ?>">
            </td>
        </tr>
        <tr>
            <td> Nombres de kilomètres </td>
            <td> <input type="text" placeholder="xxxx Km" name="nbKilometre" value="<?php echo ($leVehicule != null) ? $leVehicule['nbKilometre'] : ''; ?>">
            </td>
        </tr>
        <tr>
            <td> Type de Consomation </td>
            <td> <input type="text" placeholder="Type de consommation" name="typeConso" value="<?php echo ($leVehicule != null) ? $leVehicule['typeConso'] : ''; ?>">
            </td>
        </tr>
        <tr>
            <td> Puissance </td>
            <td> <input type="text" placeholder="xxxx Cv" name="puissance" value="<?php echo ($leVehicule != null) ? $leVehicule['puissance'] : ''; ?>">
            </td>
        </tr>
        <tr>
            <td> Nom et prénom du Moniteurs </td>
            <td>
                <select name="idmoniteur">
                    <?php
                    foreach ($lesMoniteurs as $unMoniteur) {
                        echo "<option value='" . $unMoniteur['idmoniteur'] . "'>" . $unMoniteur['nomMoniteur'] . " " . $unMoniteur['prenomMoniteur'] . "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td> <input type="reset" name="annuler" value="Annuler">
                <input type="submit" <?php echo ($leVehicule != null) ? 'name ="modifier" value ="Modifier"' : 'name ="valider" value ="Valider"'; ?>>
            </td>
        </tr>
        <?php echo ($leVehicule != null) ? '<input type="hidden" name="idvehicule" value="' . $leVehicule['idvehicule'] . '">' : ''; ?>
    </table>

</form>