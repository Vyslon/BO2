<?php

require_once 'Modele/Compte.php';
require_once 'Vue/Vue.php';

class ControleurModificationCompte {
  public static function modifierCompte($numero_telephone, $adresse, $mot_de_passe) {
    $compte = new Compte();
    $id = $_SESSION['id'];
    $adherent = $compte->infosCompte($id);
    if (strlen($numero_telephone) == 0) {
      $numero_telephone = $adherent['num_telephone_adh'];
    }
    if (strlen($adresse) == 0) {
      $adresse = $adherent['adresse_adh'];
    }
    if (strlen($mot_de_passe) == 0) {
      $mot_de_passe = $adherent['mdp_adh'];
    }
    else {
      $mot_de_passe = password_hash($mot_de_passe, PASSWORD_DEFAULT);
    }
    $compte->modifierCompte($id, $adresse, $mot_de_passe, $numero_telephone);
    $compte = new Compte();
    $statut = $compte->statutsAdherent($id);
    $statut = adapterStatuts($statut);
    if (count($statut) > 1 and $statut[0] !== "") {
      $statut = implode(", ", $statut);
    }
    else {
        $statut = implode($statut);
    }
    $actif = $compte->adherentActif($id);
    $adherent = $compte->infosCompte($id);
    $statutActif = array('statut' => implode(", ", $statut),  8 => $statut, 'actif' => $actif, 9 => $actif);
    $adherent = array_merge($adherent, $statutActif);
    $vue = new Vue("parametresCompte");
    $vue->generer(array('adherent' => $adherent));
  }
}
