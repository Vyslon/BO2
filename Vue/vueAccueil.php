<?php
  $this->titre = "Accueil Secrétaire";
?>

<article>
    <br />
    <h1>Accueil</h1>
    <br />
    <?php if (in_array('secretaire', $_SESSION['statut'])): ?>
      <h2><a href="index.php?action=inscriptionSource">Inscrire un adhérent</a></h2>
      <h2><a href="index.php?action=adherents">Liste des adhérents inscrits</a></h2>
    <?php endif; ?>

    <?php if (in_array('simple_adherent', $_SESSION['statut'])): ?>
      <h2><a href="index.php?action=trombinoscope">Trombinoscope</a></h2>
      <h2><a href="index.php?action=annuaire">Annuaire</a></h2>
    <?php endif; ?>
    <h2><a href="index.php?action=parametresCompte">Modifier mon compte</a></h2>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <h2><a href="index.php?action=deconnexion">Se déconnecter</a></h2>

</article>
