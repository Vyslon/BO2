<?php

require_once 'Vue/Vue.php';

class ControleurAccueil {

  public static function accueil() {
    $vue = new Vue("Accueil");
    $vue->generer();
  }

}
