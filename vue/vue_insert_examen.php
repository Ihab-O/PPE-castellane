<br>
<h3> Insertion d'un Examen </h3>
<br>
<form method="post" action="">
    <table border="0" class="table table-dark">
        <tr>
            <td> Type d'examen </td>
            <td> <input type="text" placeholder="Type d'examen" name="typeExamen" value="<?php echo ($leExamen != null) ? $leExamen['typeExamen'] : ''; ?>">
            </td>
        </tr>
        <tr>
            <td> Date de l'examen </td>
            <td> <input type="date" placeholder="YYYY-MM-DD" pattern="(?:19|20)[0-9]{​​2}​​-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" name="dateExamen" value="<?php echo ($leExamen != null) ? $leExamen['dateExamen'] : ''; ?>">
            </td>
        </tr>
        <tr>
            <td> Heure de l'examen </td>
            <td> <input type="text" placeholder="24:00:00" pattern="^([0-1]?\d|2[0-3])(?::([0-5]?\d))?(?::([0-5]?\d))?$" name="heureExamen" value="<?php echo ($leExamen != null) ? $leExamen['heureExamen'] : ''; ?>">
            </td>
        </tr>
        <tr>
            <td> Résultat de l'examen </td>
            <td> <input type="text" placeholder="admis / non-admis" name="resultatExamen" value="<?php echo ($leExamen != null) ? $leExamen['resultatExamen'] : ''; ?>">
            </td>
        </tr>
        <tr>
            <td> Nom et prénom de l'étudiant </td>
            <td>
                <select name="idetudiant">
                    <?php
                    foreach ($lesEtudiants as $unEtudiant) {
                        echo "<option value='" . $unEtudiant['idetudiant'] . "'>" . $unEtudiant['nomEtudiant'] . " " . $unEtudiant['prenomEtudiant'] . "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td> <input type="reset" name="annuler" value="Annuler">
                <input type="submit" <?php echo ($leExamen != null) ? 'name ="modifier" value ="Modifier"' : 'name ="valider" value ="Valider"'; ?>>
            </td>
        </tr>
        <?php echo ($leExamen != null) ? '<input type="hidden" name="idexamen" value="' . $leExamen['idexamen'] . '">' : ''; ?>
    </table>

</form>