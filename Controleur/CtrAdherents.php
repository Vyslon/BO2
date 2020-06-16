<?php

require_once 'Modele/Compte.php';
require_once 'Vue/Vue.php';
require_once 'Utilitaires/fonctions.php';

class ControleurAdherents {
  public static function afficherListeaAdherents($vueNom) {
    $compte = new Compte();
    $adherentsActifs = $compte->listeComptesAdherents(0);
    $adherentsActifs = $adherentsActifs->fetchAll();
    $adherentsAct = array();
    foreach ($adherentsActifs as $adherent) {
      $statut = $compte->statutsAdherent($adherent['id_adh']);
      $statut = adapterStatuts($statut);
      if (count($statut) > 1 and $statut[0] !== "") {
        $statut = implode(", ", $statut);
      }
      else {
          $statut = implode($statut);
      }
      $adherent['statut'] = $statut;
      array_push($adherentsAct, $adherent);
    }
    $adherentsInactifs = $compte->listeComptesAdherents(1);
    $adherentsInactifs = $adherentsInactifs->fetchAll();
    $adherentsInact = array();
    foreach ($adherentsInactifs as $adherent) {
      $statut = $compte->statutsAdherent($adherent['id_adh']);
      $statut = adapterStatuts($statut);
      if (count($statut) > 1 and $statut[0] !== "") {
        $statut = implode(", ", $statut);
      }
      else {
          $statut = implode($statut);
      }
      $adherent['statut'] = $statut;
      array_push($adherentsInact, $adherent);
    }
    $vue = new Vue($vueNom);
    $vue->generer(array('adherentsActifs' => $adherentsAct, 'adherentsInactifs' => $adherentsInact));
  }
}
