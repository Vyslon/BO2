<?php $this->titre = $adherent['prenom_adh'] . $adherent['nom_adh']; ?>

<h2><a href="index.php?action=adherents">Liste des adhérents inscrits</a></h2>

  <hr />

  <p>
    Nom : <?= $adherent['nom_adh'] ?>
    <br/>
    Prénom : <?= $adherent['prenom_adh'] ?>
    <br/>
    Login : <?= $adherent['login_adh'] ?>
    <br/>
    Date de Naissance : <?= $adherent['datenaissance_adh'] ?>
    <br/>
    Date d'inscription : <?= $adherent['dateinscription_adh'] ?>
    <br/>
    Statut :  <?= $adherent['statut'] ?>
    <br/>
    <label for="adherent">Ajoutez un statut :</label>
    <form action=<?= "index.php?action=ajouterStatut&id=" .  $adherent['id_adh']?> method="POST">

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
          <option value="estresponsablemateriel_adh">Responsable Matériel</option>
          <option value="estresponsableplanning_adh">Responsable Planning</option>
      </select>
      <button type="submit" name="ajouterStatut">Ajouter un statut</button>
    </form>
    <form action=<?= "index.php?action=supprimerStatut&id=" .  $adherent['id_adh']?> method="POST">
      <select name="statut" id="adherent" required>
        <option value="">--Choisissez un statut--</option>
        <?php foreach (explode(",", $adherent['statut']) as $statut) {
          echo '<option value="' . trim($statut) . '">' . $statut . '</option>';
        }
        ?>
      </select>
      <button type="submit" name="supprimerStatut">Supprimer un statut</button>

    <br/>
    </form>
    <label for="datefincertifmed">Date fin de certificat médical :</label>
    <form action=<?= "index.php?action=modifCertMed&id=" .  $adherent['id_adh']?> method="POST">
      <input type="date" id="datefincertifmed" name="datefincertifmed"
             value=<?= $adherent['datefincertifmed_adh'] ?>
             min="1920-01-01" max="2099-12-31">
      <button type="submit" name="modifCertMed">Modifier</button>
    </form>

    <br/>

      <?php if ($adherent['actif']): ?>
        <form action=<?= "index.php?action=changerEtatArchive&id=" .  $adherent['id_adh'] . "&archive=1" ?> method="POST">
            <input id="changementEtatArchive" name="changementEtatArchive" type="hidden" value="archiver">
            <button type="submit" name="archiver">Archiver</button>
        </form>
      <?php else: ?>
        <form action=<?= "index.php?action=changerEtatArchive&id=" .  $adherent['id_adh'] . "&archive=0" ?> method="POST">
            <input id="changementEtatArchive" name="changementEtatArchive" type="hidden" value="desarchiver">
            <button type="submit" name="desarchiver">Désarchiver</button>
        </form>
      <?php endif; ?>
       <br/>
    </p>

    <hr />
