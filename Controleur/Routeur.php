<?php

session_start();

require_once 'Controleur/CtrAccueil.php';
require_once 'Controleur/CtrAdherents.php';
require_once 'Controleur/CtrAjoutStatut.php';
require_once 'Controleur/CtrChangementEtat.php';
require_once 'Controleur/CtrConnexion.php';
require_once 'Controleur/CtrDeconnexion.php';
require_once 'Controleur/CtrDetailsCompte.php';
require_once 'Controleur/CtrConnexionSource.php';
require_once 'Controleur/CtrInscriptionSource.php';
require_once 'Controleur/CtrInscription.php';
require_once 'Controleur/CtrModifCertif.php';
require_once 'Controleur/CtrModifCompte.php';
require_once 'Controleur/CtrSuppressionStatut.php';
require_once 'Vue/Vue.php';
class Routeur {



    public function routerRequete() {
        try {
          if (!empty($_SESSION)) {
            if (in_array('secretaire', $_SESSION['statut'])) {
             if (isset($_GET['action'])) {
                 if ($_GET['action'] == 'inscriptionSource') {
                  ControleurInscriptionSource::sourceInscription();
                 }
                 else if ($_GET['action'] == 'inscription') {
                   $nom = $this->getParametre($_POST, 'nom');
                   $prenom = $this->getParametre($_POST, 'prenom');
                   $date_naissance = $this->getParametre($_POST, 'date_naissance');
                   $statut = $this->getParametre($_POST, 'statut');
                   $datefincertifmed = $this->getParametre($_POST, 'datefincertifmed');
                   $adresse = $this->getParametre($_POST, 'adresse');
                   $numero_telephone = $this->getParametre($_POST, 'telephone');
                   if (isset($_POST['responsableMateriel']))
                   {
                     $estresponsablemateriel = 1;
                   }
                   else {
                     $estresponsablemateriel = 0;
                   }
                   if (isset($_POST['responsablePlanning']))
                   {
                     $estresponsableplanning = 1;
                   }
                   else {
                     $estresponsableplanning = 0;
                   }
                   ControleurInscription::inscription($nom, $prenom, $date_naissance, $statut, $datefincertifmed, $estresponsablemateriel, $estresponsableplanning, $adresse, $numero_telephone);
                 }
                 else if ($_GET['action'] == 'deconnexion') {
                   ControleurDeconnexion::deconnexion();
                 }
                 else if ($_GET['action'] == 'adherents') {
                   ControleurAdherents::afficherListeaAdherents("Adherents");
                 }
                 else if ($_GET['action'] == 'compte') {
                   ControleurDetailsCompte::afficherDetailsCompte($_GET['id'], "DetailsCompte");
                 }
                 else if ($_GET['action'] == 'changerEtatArchive') {
                   if ($_GET['archive'] == 1)
                    ControleurChangerEtat::changerEtatCompte($_GET['id'], 1);
                   else
                    ControleurChangerEtat::changerEtatCompte($_GET['id'], 0);
                 }
                 else if ($_GET['action'] == 'modifCertMed') {
                    $dateFin = $this->getParametre($_POST, 'datefincertifmed');
                    ControleurModifCertif::modifierDateFinCertifMed($_GET['id'], $dateFin);
                 }
                 else if ($_GET['action'] == 'ajouterStatut') {
                   $statut = $this->getParametre($_POST, 'statut');
                   ControleurAjoutStatut::ajouterStatutCompte($_GET['id'], $statut);
                 }
                 else if ($_GET['action'] == 'supprimerStatut') {
                   $statut = $this->getParametre($_POST, 'statut');
                   ControleurSuppressionStatut::supprimerStatutCompte($_GET['id'], $statut);
                 }
                 else if ($_GET['action'] == 'parametresCompte') {
                   ControleurDetailsCompte::afficherDetailsCompte($_SESSION['id'], "parametresCompte");
                 }
                 else if ($_GET['action'] == 'modifierCompte') {
                   $numero_telephone = $this->getParametre($_POST, 'telephone');
                   $adresse =  $this->getParametre($_POST, 'adresse');
                   $mot_de_passe = $this->getParametre($_POST, 'mot_de_passe');
                   if ($mot_de_passe != $this->getParametre($_POST, 'mot_de_passe_verif'))
                   {
                     $mot_de_passe = '';
                   }
                   ControleurModificationCompte::modifierCompte($numero_telephone, $adresse, $mot_de_passe);
                 }
              }
             else {
               ControleurAccueil::accueil();
             }
            }
            else {
              if (isset($_GET['action'])) {
                if ($_GET['action'] == 'parametresCompte') {
                  ControleurDetailsCompte::afficherDetailsCompte($_SESSION['id'], "parametresCompte");
                }
                else if ($_GET['action'] == 'modifierCompte') {
                  $numero_telephone = $this->getParametre($_POST, 'telephone');
                  $adresse =  $this->getParametre($_POST, 'adresse');
                  $mot_de_passe = $this->getParametre($_POST, 'mot_de_passe');
                  if ($mot_de_passe != $this->getParametre($_POST, 'mot_de_passe_verif'))
                  {
                    $mot_de_passe = '';
                  }
                  ControleurModificationCompte::modifierCompte($numero_telephone, $adresse, $mot_de_passe);
                }
                else if ($_GET['action'] == 'deconnexion') {
                  ControleurDeconnexion::deconnexion();
                }
                else if ($_GET['action'] == 'annuaire') {
                  ControleurAdherents::afficherListeaAdherents("Annuaire");
                }
                else if ($_GET['action'] == 'trombinoscope') {
                  ControleurAdherents::afficherListeaAdherents("trombinoscope");
                }
              }
              else {
                ControleurAccueil::accueil();
              }
            }
          }
          else {
             if (isset($_GET['action'])) {
               if ($_GET['action'] == 'connexion') {
                 $login = $this->getParametre($_POST, 'login');
                 $mot_de_passe = $this->getParametre($_POST, 'motDePasse');
                 ControleurConnexion::connexion($login, $mot_de_passe);
               }
               else {
                 ControleurConnexionSource::sourceConnexion();
               }
            }
            else
            {
                ControleurConnexionSource::sourceConnexion();
            }
          }
        }
        catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    private function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }

    private function getParametre($tableau, $nom) {
    if (isset($tableau[$nom])) {
        return $tableau[$nom];
    }
    else
        throw new Exception("Paramètre '$nom' absent");
}

}
