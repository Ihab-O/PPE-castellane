<br>
<h3> Liste des étudiants </h3>
<br>
<!--
<form method ="post" action ="">
    Rechercher <input type="text" name="mot">
    <input type="submit" name="ok" value ="Ok" >
</form>
<br/>
-->
<table border="1" class="table table-dark">
    <tr>
        <td> Id Etudiant </td> <td> Nom</td> <td> Prénom </td>
        <td> Date de naissance </td> <td> Téléphone </td>
        <td> Adresse </td> <td> Niveau d'études </td>
        <td> Réductions </td>
        <td> Opération</td>
    </tr>

    <?php
    foreach ($lesEtudiants as $unEtudiant) {
        echo " <tr>
                <td> ". $unEtudiant['idetudiant']."</td>
                <td> ". $unEtudiant['nomEtudiant']."</td>
                <td> ". $unEtudiant['prenomEtudiant']."</td>
                <td> ". $unEtudiant['dateNaissance']."</td>
                <td> ". $unEtudiant['telephone']."</td>
                <td> ". $unEtudiant['adresseEtudiant']."</td>
                <td> ". $unEtudiant['niveauxEtudes']."</td>
                <td> ". $unEtudiant['reduction']."</td>
                <td>
                    <a href='index.php?page=2&action=sup&idetudiant=".$unEtudiant['idetudiant']."'> X </a>
                    <a href='index.php?page=2&action=edit&idetudiant=".$unEtudiant['idetudiant']."'> E </a>
                </td>
                </tr>
                ";
        }
    ?>
</table>