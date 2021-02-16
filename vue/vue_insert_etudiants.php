<br>
<h3> Insertion d'un Etudiant </h3>
<br>
<form method="post" action="">
    <table class="table table-dark">
        <tr>
            <td> Nom Etudiant </td>
            <td>
                <input type="text" placeholder="Nom de l'étudiant" name="nomEtudiant" value="<?php echo ($leEtudiant != null) ? $leEtudiant['nomEtudiant'] : ''; ?>">
            </td>
        </tr>
        <tr>
            <td> Prénom Etudiant </td>
            <td>
                <input type="text"  placeholder="Prenom de l'étudiant" name="prenomEtudiant" value="<?php echo ($leEtudiant != null) ? $leEtudiant['prenomEtudiant'] : ''; ?>">
            </td>
        </tr>
        <tr>
            <td> Date de naissance </td>
            <td>
                <input type="date" placeholder="YYYY-MM-DD" pattern="(?:19|20)[0-9]{​​2}​​-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" name="dateNaissance" value="<?php echo ($leEtudiant != null) ? $leEtudiant['dateNaissance'] : ''; ?>">
            </td>
        </tr>
        <tr>
            <td> Télephone </td>
            <td>
                <input type="tel" name="telephone" placeholder="0678908765" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" value="<?php echo ($leEtudiant != null) ? $leEtudiant['telephone'] : ''; ?>">
            </td>
        </tr>
        <tr>
            <td> Adresse Étudiants </td>
            <td>
                <input type="text" placeholder="Adresse" name="adresseEtudiant" value="<?php echo ($leEtudiant != null) ? $leEtudiant['adresseEtudiant'] : ''; ?>">
            </td>
        </tr>
        <tr>
            <td> Niveau Étude </td>
            <td>
                <input type="number" placeholder="1" min="1" max="3" name="niveauxEtudes" value="<?php echo ($leEtudiant != null) ? $leEtudiant['niveauxEtudes'] : ''; ?>">
                <em>    1 (CAP-BAC) - 2 (BTS) - 3 (LICENCE-MASTER)</em>
            </td>
        </tr>
        <tr>
            <td> Réductions </td>
            <td>
                <input type="text" placeholder="0-100" name="reduction" value="<?php echo ($leEtudiant != null) ? $leEtudiant['reduction'] : ''; ?>">
                <em> % </em>
            </td>
        </tr>
        <tr>
            <td>
                <input type="reset" name="annuler" value="Annuler">
                <input type="submit" <?php echo ($leEtudiant != null) ? 'name ="modifier" value ="Modifier"' : 'name ="valider" value ="Valider"'; ?>>
            </td>
        </tr>
        <?php echo ($leEtudiant != null) ? '<input type="hidden" name="idetudiant" value="' . $leEtudiant['idetudiant'] . '">' : ''; ?>
    </table>
</form>