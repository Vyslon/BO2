<?php $this->titre = "Trombinoscope"; ?>

<h3 style="text-decoration : underline"> En gras : les adhérents actifs, en italique : les adhérents inactifs </h3>

<?php foreach ($adherentsActifs as $adherent):
    ?>
    <p style="font-weight : bold">
      <img src=<?= "img/" . $adherent['id_adh'] . ".jpg" ?>>
      <?= ucfirst($adherent['nom_adh']) ?>
      <?= ucfirst($adherent['prenom_adh']) ?>
      <br/>
      <?= $adherent['statut'] ?>

    </p>

    <hr />
<?php endforeach; ?>

<?php foreach ($adherentsInactifs as $adherent):
    ?>
    <p style="font-style : italic">
      <img src=<?= "img/" . $adherent['id_adh'] . ".jpg" ?>>
      <?= $adherent['nom_adh'] ?>
      <?= $adherent['prenom_adh'] ?>
      <br/>
      <?= $adherent['statut'] ?>


    </p>

    <hr />
<?php endforeach; ?>
