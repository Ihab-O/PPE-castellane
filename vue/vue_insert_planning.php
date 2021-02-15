<br>
<h3> Plannification des cours </h3>
<br>
<form method="post" action="">
    <table class="table table-dark">
        <tr>
            <td> Date du cours </td>
            <td>
                <select name="idcours">
                    <?php
                    foreach ($lesCours as $unCours) {
                        echo "<option value='".$unCours['idcours']."'>".$unCours['dateCours']."</option>";
                        echo "<option disabled>".$unCours['heureCours']."</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td> Nom et prénom de l'étudiant </td>
            <td>
                <select name="idetudiant">
                    <?php
                    foreach ($lesEtudiants as $unEtudiant) {
                        echo "<option value='".$unEtudiant['idetudiant']."'>".$unEtudiant['nomEtudiant']." ".$unEtudiant['prenomEtudiant']."</option>";
                        echo "<option disabled>".$unEtudiant['telephone']."</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td> Nom et prénom du Moniteur </td>
            <td>
                <select name="idmoniteur">
                    <?php
                    foreach ($lesMoniteurs as $unMoniteur) {
                        echo "<option value='".$unMoniteur['idmoniteur']."'>".$unMoniteur['nomMoniteur']." ".$unMoniteur['prenomMoniteur']."</option>";
                        echo "<option disabled>".$unMoniteur['typeMoniteur']."</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
        <td> 
            <input type="reset" name="annuler" value="Annuler">
            <input type="submit" <?php echo ($lePlanning != null) ? 'name ="modifier" value ="Modifier"' : 'name ="valider" value ="Valider"'; ?>>
            </td>
        </tr>
        <?php echo ($lePlanning != null) ? '<input type="hidden" name="idcours" value="' . $lePlanning['idcours'] . '">' : ''; ?>
    </table>
</form>