<br>
<h3> Insertion d'un Cours </h3>
<br>
<form method="post" action="">
    <table border="0" class="table table-dark">
            <td> Date du cours </td>
            <td> 
                <input type="date" placeholder="YYYY-MM-DD" pattern="(?:19|20)[0-9]{​​2}​​-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" name="dateCours" value="<?php echo ($leCours != null) ? $leCours['dateCours'] : ''; ?>">
            </td>
        </tr>
        <tr>
            <td> Nombre d'heure du cours </td>
            <td> 
                <input type="time" name="heureCours" min="00:00" max="04:00" value="<?php echo ($leCours != null) ? $leCours['heureCours'] : ''; ?>">
            </td>
        </tr>
        <tr>
            <td> Tarif du Cours </td>
            <td> 
                <input type="number" placeholder="0" name="tarifHeure" step="any" value="<?php echo ($leCours != null) ? $leCours['tarifHeure'] : ''; ?>">
            </td>
        </tr>
            <td> <input type="reset" name="annuler" value="Annuler">
                <input type="submit" <?php echo ($leCours != null) ? 'name ="modifier" value ="Modifier"' : 'name ="valider" value ="Valider"'; ?>>
            </td>
        </tr>
        <?php echo ($leCours != null) ? '<input type="hidden" name="idcours" value="' . $leCours['idcours'] . '">' : ''; ?>
    </table>
</form>