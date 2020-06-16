<?php

require_once 'Vue/Vue.php';

class ControleurConnexionSource {

  public static function sourceConnexion() {
    $vue = new Vue("ConnexionSource");
    $vue->generer();
  }

}
