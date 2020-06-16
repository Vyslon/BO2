<?php

require_once 'Modele/Compte.php';
require_once 'Vue/Vue.php';

class ControleurModifCertif {
  public static function modifierDateFinCertifMed($id, $dateFin) {
    $compte = new Compte();
    $compte->modifiCertifMedical($id, $dateFin);
    $adherent = $compte->infosCompte($id);
    $statut = $compte->statutsAdherent($id);
    $actif = $compte->adherentActif($id);
    $statutActif = array('statut' => implode(", ", $statut),  8 => $statut, 'actif' => $actif, 9 => $actif);
    $adherent = array_merge($adherent, $statutActif);
    $vue = new Vue("DetailsCompte");
    $vue->generer(array('adherent' => $adherent));
    }
  }
