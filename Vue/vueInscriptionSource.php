<?php
  $this->titre = "Inscription d'un adhérent";
?>

<article>
    <br />
    <h1>Inscription d'un adhérent</h1>
    <br />
    <form action="index.php?action=inscription" method="POST">

        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" placeholder ="Nom" required >
        <br/>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" placeholder ="Prénom" required >
        <br/>

        <label for="date_naissance">Date de naissance : </label>

        <input type="date" id="date_naissance" name="date_naissance"
               value="2001-07-28"
               min="1920-01-01" max="2015-05-28">
        <br/>
       <label for="datefincertifmed">Date de fin de certificat médical : </label>


       <input type="date" id="datefincertifmed" name="datefincertifmed"
              value="2001-07-28"
              min="1920-01-01" max="2099-12-31">
        <br/>

        <label for="adherent">Statut :</label>

        <select name="statut" id="adherent" required>
            <option value="">--Choisissez un statut--</option>
            <option value="simple_adherent">Simple adhérent</option>
            <option value="entraineur">Entraîneur</option>
            <option value="coach">Coach</option>
            <option value="president">Président</option>
            <option value="president_adjoint">Président Adjoint</option>
            <option value="secretaire">Secrétaire</option>
            <option value="secretaire_adjoint">Secrétaire Adjoint</option>
            <option value="tresorier">Trésorier</option>
        </select>

        <div>
            <input type="checkbox" id="responsableMateriel" name="responsableMateriel" value="1">
            <label for="responsableMateriel">Responsable Matériel</label>
        </div>

        <div>
            <input type="checkbox" id="responsablePlanning" name="responsablePlanning" value="2">
            <label for="responsablePlanning">Responsable Planning</label>
        </div>

        <label for="adresse">Adresse : </label>
        <input type="text" id="adresse" name="adresse"  maxlength="80">
        <br/>
        <label for="telephone">Numéro de téléphone : </label>
        <input type="tel" id="telephone" name="telephone" maxlength="10">

        <br/>
        <br/>


        <button type="submit" name="inscription">Inscrire</button>
        <button type="reset" name="reinitialiser">Réinitialiser</button>
    </form>

</article>
