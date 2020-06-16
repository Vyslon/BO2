<?php $this->titre = "Annuaire"; ?>

<h3 style="text-decoration : underline"> En gras : les adhérents actifs, en italique : les adhérents inactifs </h3>

<?php foreach ($adherentsActifs as $adherent):
    ?>
    <p style="font-weight : bold">
      <?= ucfirst($adherent['nom_adh']) ?>
      <?= ucfirst($adherent['prenom_adh']) ?>
      <br/>
      <?= $adherent['adresse_adh'] ?>
      <br/>
      <?= $adherent['num_telephone_adh'] ?>
    </p>

    <hr />
<?php endforeach; ?>

<?php foreach ($adherentsInactifs as $adherent):
    ?>
    <p style="font-style : italic">
      <?= $adherent['nom_adh'] ?>
      <?= $adherent['prenom_adh'] ?>
      <br/>
      <?= $adherent['adresse_adh'] ?>
      <br/>
      <?= $adherent['num_telephone_adh'] ?>

    </p>

    <hr />
<?php endforeach; ?>
