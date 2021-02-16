<br>
<h3> Liste des Cours </h3>
<br>
<table border="1" class="table table-dark">
    <tr>
        <td> Date du Cours </td>
        <td> Nombre d'heure du Cours </td>
        <td> Tarif à l'heure </td>
        <td> Opération </td>
    </tr>

    <?php
    foreach ($lesCours as $unCours) {
        echo  "<tr>
                <td> " . $unCours['dateCours'] . "</td>
                <td> " . $unCours['heureCours'] . "</td>
                <td> " . $unCours['tarifHeure'] . "</td>
                <td>
                    <a href='index.php?page=5&action=sup&idcours=" . $unCours['idcours'] . "'> X </a>
                    <a href='index.php?page=5&action=edit&idcours=" . $unCours['idcours'] . "'> E </a>
                </td>
                </tr>
                ";
    }
    ?>
</table>