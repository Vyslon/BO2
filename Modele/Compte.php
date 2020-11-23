<?php
require_once 'Modele.php';

class Compte extends Modele {

  public function infosCompte($id) {
      $sql = "SELECT * FROM adherent WHERE id_adh = :id";

      $infos = $this->executerRequete($sql, array('id' => $id));
      if ($infos->rowCount() > 0)
          return $infos->fetch();
      else
          throw new Exception("Aucun compte ne correspond à l'id '$id'");
  }

  public function creerCompte($nom, $prenom, $date_naissance, $datefincertifmed, $login, $mot_de_passe, $statut, $estresponsablemateriel, $estresponsableplanning, $adresse, $numero_telephone) {
    try {
      $loginValide = false;
      do {
        $sql = "SELECT * FROM adherent WHERE login_adh = :login";
        $loginValide = $this->executerRequete($sql, array("login" => $login));
        if ($loginValide->rowCount() == 0)
          $loginValide = true;
        else {
          $login = $login . rand();
        }
      } while (!$loginValide);
      $id = substr(strtoupper($login), 0, 7);
      if ($statut == "simple_adherent") {
        $statut = null;
      }
      elseif ($statut == "coach" || $statut == "entraineur") {
        $sql = "INSERT INTO " . $statut . " VALUES (:id)";
        $ajoutStatut = $this->executerRequete($sql, array("id" => $id));
        $statut = null;
      }
      $sql = "INSERT INTO adherent VALUES (?, ?, ?, ?, ?, CURDATE(), ?, ?, ?, ?, ?, ?, ?, ?)";
      $inscriptionReussie = $this->executerRequete($sql, array($id, 1, $nom, $prenom, $date_naissance,
                                                              $datefincertifmed, $statut, $estresponsablemateriel,
                                                              $estresponsableplanning, $login, $mot_de_passe, $adresse,
                                                              $numero_telephone));

    }
    catch (PDOException $e) {
      throw new Exception("Données de création de compte invalides <br/> <h2><a href=\"index.php?action=inscriptionSource\">Réessayer</a></h2>");
    }
    if ($inscriptionReussie->rowCount() > 0)
      return true;
    else
      return false;
  }

  public function listeComptesAdherents($archive) {
    if ($archive == 0)
      $sql = "SELECT * from adherent WHERE actif_adh = 1";
    else
      $sql = "SELECT * from adherent WHERE actif_adh = 0";

    $comptes = $this->executerRequete($sql);
    if ($comptes->rowCount() > 0)
        return $comptes;
    else
        throw new Exception("Aucun compte adhérent (il est nécessaire d'avoir au moins 1 compte actif et 1 compte inactif)");
  }

  public function changerEtat($id, $archive) {
    if ($archive == 0) {
      $sql = "UPDATE adherent SET  actif_adh = 1 WHERE id_adh = :id";
    }
    else {
      $sql = "UPDATE adherent SET  actif_adh = 0 WHERE id_adh = :id";
    }

    try {
      $modifReussie = $this->executerRequete($sql, array('id' => $id));
    }
    catch (PDOException $e) {
      throw new Exception("Identifiant invalide");
    }
    if ($modifReussie->rowCount() > 0)
      return true;
    else
      return false;
  }

  public function adherentActif($id) {
    $sql = "SELECT actif_adh FROM adherent WHERE id_adh = :id";

    $adherentInactif = $this->executerRequete($sql, array('id' => $id));
    $actif = $adherentInactif->fetch();
    if ($actif['actif_adh'] == 0)
        return false;
    else
        return true;
  }

  public function statutsAdherent($id) {
    $statuts = array();
    $sql = "SELECT fonctionbureau_adh FROM adherent WHERE id_adh = :id";
    $fonction = $this->executerRequete($sql, array('id' => $id));
    $fonctionAdh = $fonction->fetch();
    if (isset($fonctionAdh['fonctionbureau_adh']))
      array_push($statuts, $fonctionAdh['fonctionbureau_adh']);

    $sql = "SELECT * FROM entraineur WHERE id_adh = :id";
    $entraineur = $this->executerRequete($sql, array('id' => $id));
    if ($entraineur->rowCount() > 0)
        array_push($statuts, 'entraineur');

    $sql = "SELECT * FROM coach WHERE id_adh = :id";
    $coach = $this->executerRequete($sql, array('id' => $id));
    if ($coach->rowCount() > 0)
        array_push($statuts, 'coach');

    $sql = "SELECT estresponsablemateriel_adh  FROM adherent WHERE id_adh = :id";
    $respoMateriel = $this->executerRequete($sql, array('id' => $id));
    $respoMateriel = $respoMateriel->fetch();
    if ($respoMateriel['estresponsablemateriel_adh'] == 1) {
      array_push($statuts, 'estresponsablemateriel_adh');
    }

    $sql = "SELECT estresponsableplanning_adh  FROM adherent WHERE id_adh = :id";
    $respoPlanning = $this->executerRequete($sql, array('id' => $id));
    $respoPlanning = $respoPlanning->fetch();
    if ($respoPlanning['estresponsableplanning_adh'] == 1) {
      array_push($statuts, 'estresponsableplanning_adh');
    }

    if (count($statuts) == 1 && $statuts[0] == "") {
      array_push($statuts, 'adherent');
    }
    return $statuts;
  }

  public function modifiCertifMedical($id, $datefincertifmed) {
    $sql = "UPDATE adherent SET datefincertifmed_adh = :datefin WHERE id_adh = :id";
    try {
      $modifAppliquee = $this->executerRequete($sql, array("datefin" => $datefincertifmed, "id" => $id));
    }
    catch (PDOException $e) {
      throw new Exception("Modification invalide");
    }
    if ($modifAppliquee->rowCount() > 0)
      return true;
    else
      return false;

  }

  public function ajouterStatut($id, $statut) {
    try {
      if (in_array($statut, array("coach", "entraineur"))) {
        $sql = "INSERT INTO " . $statut . " VALUES (:id)";
        $ajoutStatut = $this->executerRequete($sql, array("id" => $id));
      }
      elseif (in_array($statut, array("estresponsableplanning_adh", "estresponsablemateriel_adh"))) {
        $sql = "UPDATE adherent SET " . $statut . " = 1 WHERE id_adh = :id";
        $ajoutStatut = $this->executerRequete($sql, array("id" => $id));
      }
      else {
        $sql = "UPDATE adherent SET fonctionbureau_adh = :statut WHERE id_adh = :id";
        $ajoutStatut = $this->executerRequete($sql, array("id" => $id, "statut" => $statut));
      }
    }
    catch (PDOException $e) {
      throw new Exception("Données d'ajout de statut invalides");
    }
  }

  public function supprimerStatut($id, $statut) {
    try {
      if (in_array($statut, array("coach", "entraineur"))) {
        $sql = "DELETE FROM " . $statut . " WHERE id_adh = :id";
        $ajoutStatut = $this->executerRequete($sql, array("id" => $id));
      }
      elseif (in_array($statut, array("estresponsableplanning_adh", "estresponsablemateriel_adh"))) {
        $sql = "UPDATE adherent SET " . $statut . " = 0 WHERE id_adh = :id";
        $ajoutStatut = $this->executerRequete($sql, array("id" => $id));
      }
      else {
        $sql = "UPDATE adherent SET fonctionbureau_adh = NULL WHERE id_adh = :id";
        $ajoutStatut = $this->executerRequete($sql, array("id" => $id));
      }
    }
    catch (PDOException $e) {
      throw new Exception("Données de suppression de statut invalides");
    }
  }

  public function modifierCompte($id, $adresse, $mot_de_passe, $numero_telephone) {
    $sql = "UPDATE adherent SET adresse_adh = :adr, mdp_adh = :mdp, num_telephone_adh = :numTel WHERE id_adh = :id";
    try {
      $modifAppliquee = $this->executerRequete($sql, array("adr" => $adresse, "mdp" => $mot_de_passe, "numTel" => $numero_telephone, "id" => $id));
    }
    catch (PDOException $e) {
      throw new Exception("Modification invalide");
    }
    if ($modifAppliquee->rowCount() > 0)
      return true;
    else
      return false;
  }

  public function supprimerCompte($id) {
    $sql = "DELETE FROM adherent WHERE id_adh = :id";

    try {
      $infos = $this->executerRequete($sql, array('id' => $id));
      if ($infos->rowCount() > 0)
          return $infos->fetch();
      else
          throw new Exception("Aucun compte ne correspond à l'id '$id'");
    }
    catch (PDOException $e){}

  }

}
