<?php

require_once 'Modele/Compte.php';
require_once 'Vue/Vue.php';

class ControleurAjoutStatut {
  public static function ajouterStatutCompte($id, $statut) {
    $compte = new Compte();
    $compte->ajouterStatut($id, $statut);
    $adherent = $compte->infosCompte($id);
    $statut = $compte->statutsAdherent($id);
    $statut = adapterStatuts($statut);
    if (count($statut) > 1 and $statut[0] !== "") {
      $statut = implode(", ", $statut);
    }
    else {
        $statut = implode($statut);
    }
    $actif = $compte->adherentActif($id);
    $statutActif = array('statut' => $statut,  8 => $statut, 'actif' => $actif, 9 => $actif);
    $adherent = array_merge($adherent, $statutActif);
    $vue = new Vue("DetailsCompte");
    $vue->generer(array('adherent' => $adherent));
    }
  }
