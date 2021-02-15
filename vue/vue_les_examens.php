<br>
<h3> Liste des examens </h3>
<br>
<table border="1" class="table table-dark">
    <tr>
        <td> Id examens </td>
        <td> Type d'examen </td>
        <td> Date de l'examen </td>
        <td> Heure de l'examen </td>
        <td> Résultat de l'examen </td>
        <td> Id etudiant </td>
        <td> Prenom Etudiant </td>
        <td> Nom Etudiant </td>
        <td> Opération </td>
    </tr>

    <?php
    foreach ($lesExamens as $unExamen) {
        echo " <tr>
                <td> " . $unExamen['idexamen'] . "</td>
                <td> " . $unExamen['typeExamen'] . "</td>
                <td> " . $unExamen['dateExamen'] . "</td>
                <td> " . $unExamen['heureExamen'] . "</td>
                <td> " . $unExamen['resultatExamen'] . "</td>
                <td> " . $unExamen['idetudiant'] . "</td>
                <td> " . $unExamen['prenomEtudiant'] . "</td>
                <td> " . $unExamen['nomEtudiant'] . "</td>
                <td>
                    <a href='index.php?page=7&action=sup&idexamen=" . $unExamen['idexamen'] . "'> X </a>
                    <a href='index.php?page=7&action=edit&idexamen=" . $unExamen['idexamen'] . "'> E </a>
                </td>
                </tr>
                ";
    }
    ?>
</table>