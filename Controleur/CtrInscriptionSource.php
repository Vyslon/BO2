<?php

require_once 'Vue/Vue.php';

class ControleurInscriptionSource {

  public static function sourceInscription() {
    $vue = new Vue("InscriptionSource");
    $vue->generer();
  }

}
