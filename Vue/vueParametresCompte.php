<?php $this->titre = "Mon Compte"; ?>

  <hr />

  <p>
    Nom : <?= ucfirst($adherent['nom_adh']) ?>
    <br/>
    Prénom : <?= ucfirst($adherent['prenom_adh']) ?>
    <br/>
    Login : <?= $adherent['login_adh'] ?>
    <br/>
    Date de Naissance : <?= $adherent['datenaissance_adh'] ?>
    <br/>
    Date d'inscription : <?= $adherent['dateinscription_adh'] ?>
    <br/>
    Statut :  <?= $adherent['statut'] ?>
    <br/>
    <form action=<?= "index.php?action=modifierCompte"?> method="POST">
      <label for="adresse">Adresse : </label>
      <input type="text" id="adresse" name="adresse" placeholder="<?= $adherent['adresse_adh'] ?>">
      <br/>
      <label for="telephone">Numéro de téléphone : </label>
      <input type="tel" id="telephone" name="telephone" placeholder=<?= $adherent['num_telephone_adh'] ?>>
      <br/>
      <div>
      <label for="mot_de_passe">Nouveau mot de passe (8 caractères minimum) : </label>
      <input type="password" id="mot_de_passe" name="mot_de_passe"
             minlength="8">
      </div>
      <div>
        <label for="mot_de_passe_verif">Vérifiez le mot de passe : </label>
        <input type="password" id="mot_de_passe_verif" name="mot_de_passe_verif"
               minlength="8">
        </div>
      <button type="submit" name="modifierCompte">Modifier</button>
    </form>
  </br/>
