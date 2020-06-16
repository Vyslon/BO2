<?php

require_once 'Modele/Compte.php';
require_once 'Vue/Vue.php';

class ControleurChangerEtat {
  public static function changerEtatCompte($id, $archive) {
    $compte = new Compte();
    $resultat = $compte->changerEtat($id, $archive);
    $adherent = $compte->infosCompte($id);
    $statut = $compte->statutsAdherent($id);
    if (count($statut) > 1) {
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
