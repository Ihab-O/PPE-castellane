<br>
<h3> Insertion d'un moniteurs </h3>
<br>
<form method="post" action="">
    <table class="table table-dark">
        <tr>
            <td> Nom Moniteur </td>
            <td>
                <input type="text" name="nomMoniteur" placeholder="Nom du moniteur" value="<?php echo ($leMoniteur != null) ? $leMoniteur['nomMoniteur'] : ''; ?>">
            </td>
        </tr>
        <tr>
            <td> Prénom Moniteur </td>
            <td> <input type="text" placeholder="Prenom du moniteur" name="prenomMoniteur" value="<?php echo ($leMoniteur != null) ? $leMoniteur['prenomMoniteur'] : ''; ?>"></td>
        </tr>
        <tr>
            <td> Fonction Moniteur </td>
            <td> <input type="text" placeholder="Fonction du moniteur" name="typeMoniteur" value="<?php echo ($leMoniteur != null) ? $leMoniteur['typeMoniteur'] : ''; ?>"></td>
        </tr>
        </tr>
        <td> Date Embauche </td>
        <td> <input type="date" placeholder="YYYY-MM-DD" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" name="dateEmbauche" value="<?php echo ($leMoniteur != null) ? $leMoniteur['dateEmbauche'] : ''; ?>"></td>
        <tr>
            <td>
                <input type="reset" name="annuler" value="Annuler">
                <input type="submit" <?php echo ($leMoniteur != null) ? 'name ="modifier" value ="Modifier"' : 'name ="valider" value ="Valider"'; ?>>
            </td>
        </tr>
        <?php echo ($leMoniteur != null) ? '<input type="hidden" name="idmoniteur" value="' . $leMoniteur['idmoniteur'] . '">' : ''; ?>
    </table>
</form>