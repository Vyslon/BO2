<?php

require_once 'Vue/Vue.php';

class ControleurDeconnexion {
  public static function deconnexion() {
    $_SESSION = array();
    session_destroy();
    $_GET = array();
    $vue = new Vue("ConnexionSource");
    $vue->generer();
  }
}
