<br>
<h3> Liste des Moniteurs </h3>
<br>
<!-- <form method="post" action="">
    Rechercher <input type="text" name="mot">
    <input type="submit" name="ok" value="Ok">
</form>
-->
<br>
<table border="1" class="table table-dark">
    <tr>
        <td> Nom moniteur </td>
        <td> Prénom moniteur </td>
        <td> Type Moniteur </td>
        <td> Date d'embauche </td>
        <td> Opération </td>
    </tr>
    <?php
    foreach ($lesMoniteurs as $unMoniteur) {
        echo   "<tr>
                <td> " . $unMoniteur['nomMoniteur'] . "</td>
                <td> " . $unMoniteur['prenomMoniteur'] . "</td>
                <td> " . $unMoniteur['typeMoniteur'] . "</td>
                <td> " . $unMoniteur['dateEmbauche'] . "</td>
                <td>
                    <a href='index.php?page=3&action=sup&idmoniteur=" . $unMoniteur['idmoniteur'] . "'> X </a>
                    <a href='index.php?page=3&action=edit&idmoniteur=" . $unMoniteur['idmoniteur'] . "'> E </a>
                </td>
                </tr>
            ";
    }
    ?>
</table>