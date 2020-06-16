<?php $this->titre = "Liste des inscrits"; ?>

<h3 style="text-decoration : underline"> En gras : les adhérents actifs, en italique : les adhérents inactifs </h3>

<?php foreach ($adherentsActifs as $adherent):
    ?>
    <p style="font-weight : bold">
      Nom : <?= $adherent['nom_adh'] ?> /
      Prénom : <?= $adherent['prenom_adh'] ?> /
      Login : <?= $adherent['login_adh'] ?> /
      Date de naissance : <?= $adherent['datenaissance_adh'] ?> /

      <a href=<?= "index.php?action=compte&id=" .  $adherent['id_adh']?> >
        <input class="favorite styled"
         type="button"
         value="Détails">
      </a>
    </p>

    <hr />
<?php endforeach; ?>

<?php foreach ($adherentsInactifs as $adherent):
    ?>
    <p style="font-style : italic">
      Nom : <?= $adherent['nom_adh'] ?> /
      Prénom : <?= $adherent['prenom_adh'] ?> /
      Login : <?= $adherent['login_adh'] ?> /
      Date de naissance : <?= $adherent['datenaissance_adh'] ?> /

      <a href=<?= "index.php?action=compte&id=" .  $adherent['id_adh']?> >
        <input class="favorite styled"
         type="button"
         value="Détails">
      </a>
    </p>

    <hr />
<?php endforeach; ?>
