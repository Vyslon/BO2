<?php

require '../Modele/Compte.php';

use PHPUnit\Framework\TestCase;

class testsCompte extends TestCase
{
  public function testInfosCompte() {
    $compte = new Compte();
    $adherent = $compte->infosCompte('TEST1');
    $this->assertSame('TEST1', $adherent['id_adh']);
  }

  public function testCreerCompte() {
    $compte = new Compte();
    $inscription = $compte->creerCompte('Dupond', 'Jean', '2000-10-10', '2022-10-10', 'jdupond', '10102000', 'simple_adherent', 1, 0, '3 Grande rue, Oullins', '0611223344');
    $adherent = $compte->infosCompte('JDUPOND');
    $this->assertSame('Dupond', $adherent['nom_adh']);
    $this->assertSame('Jean', $adherent['prenom_adh']);
    $this->assertSame('2000-10-10', $adherent['datenaissance_adh']);
    $this->assertSame('2022-10-10', $adherent['datefincertifmed_adh']);
    $this->assertSame('jdupond', $adherent['login_adh']);
    $this->assertSame('10102000', $adherent['mdp_adh']);
    $this->assertSame(null, $adherent['fonctionbureau_adh']);
    $this->assertSame('1', $adherent['estresponsablemateriel_adh']);
    $this->assertSame('0', $adherent['estresponsableplanning_adh']);
    $this->assertSame('3 Grande rue, Oullins', $adherent['adresse_adh']);
    $this->assertSame('0611223344', $adherent['num_telephone_adh']);

    $compte->supprimerCompte('JDUPOND');
  }

  public function testChangerEtat() {
    $compte = new Compte();
    $inscription = $compte->creerCompte('Dupond', 'Jean', '2000-10-10', '2022-10-10', 'jdupond', '10102000', 'simple_adherent', 1, 0, '3 Grande rue, Oullins', '0611223344');
    $adherent = $compte->infosCompte('JDUPOND');
    $compte->changerEtat('JDUPOND', 1);
    $adherent = $compte->infosCompte('JDUPOND');
    $this->assertSame('0', $adherent['actif_adh']);
    $compte->changerEtat('JDUPOND', 0);
    $adherent = $compte->infosCompte('JDUPOND');
    $this->assertSame('1', $adherent['actif_adh']);

    $compte->supprimerCompte('JDUPOND');

  }

  public function testListeComptes() {
    $compte = new Compte();
    $nbAdherentsActifs = count($compte->listeComptesAdherents(0)->fetchAll());
    $nbAdherentsInactifs = count($compte->listeComptesAdherents(1)->fetchAll());
    $compte->creerCompte('Durand', 'Jeanne', '2000-10-10', '2022-10-10', 'jdurand', '10102000', 'simple_adherent', 1, 0, '3 Grande rue, Oullins', '0611223344');
    $compte->creerCompte('Mithy', 'Patrick', '2002-10-10', '2022-10-10', 'pmithy', '10102002', 'simple_adherent', 1, 0, '3 Grande rue, Oullins', '0611223344');
    $compte->creerCompte('Depardieu', 'Gérard', '2003-10-10', '2022-10-10', 'gdepard', '10102003', 'simple_adherent', 1, 0, '3 Grande rue, Oullins', '0611223344');
    $compte->changerEtat('GDEPARD', 1);
    $compte->creerCompte('Duflot', 'Martine', '2004-10-10', '2022-10-10', 'mduflot', '10102004', 'simple_adherent', 1, 0, '3 Grande rue, Oullins', '0611223344');
    $compte->changerEtat('MDUFLOT', 1);
    $adherentsActifs = $compte->listeComptesAdherents(0)->fetchAll();
    $this->assertSame($nbAdherentsActifs + 2, count($adherentsActifs));
    $adherentsInactifs = $compte->listeComptesAdherents(1)->fetchAll();
    $this->assertSame($nbAdherentsInactifs + 2, count($adherentsInactifs));

    $compte->supprimerCompte('JDURAND');
    $compte->supprimerCompte('PMITHY');
    $compte->supprimerCompte('GDEPARD');
    $compte->supprimerCompte('MDUFLOT');
  }

  public function testAdherentActif() {
    $compte = new Compte();
    $compte->creerCompte('Mithy', 'Patrick', '2002-10-10', '2022-10-10', 'pmithy', '10102002', 'simple_adherent', 1, 0, '3 Grande rue, Oullins', '0611223344');
    $compte->creerCompte('Depardieu', 'Gérard', '2003-10-10', '2022-10-10', 'gdepard', '10102003', 'simple_adherent', 1, 0, '3 Grande rue, Oullins', '0611223344');
    $compte->changerEtat('GDEPARD', 1);
    $this->assertSame(true, $compte->adherentActif('PMITHY'));
    $this->assertSame(false, $compte->adherentActif('GDEPARD'));

    $compte->supprimerCompte('PMITHY');
    $compte->supprimerCompte('GDEPARD');
  }

  public function testSupprimerStatut() {
    $compte = new Compte();
    $compte->creerCompte('Duflot', 'Martine', '2004-10-10', '2022-10-10', 'mduflot', '10102004', 'coach', 1, 1, '3 Grande rue, Oullins', '0611223344');
    $compte->creerCompte('Dupond', 'Jean', '2000-10-10', '2022-10-10', 'jdupond', '10102000', 'president', 1, 0, '3 Grande rue, Oullins', '0611223344');
    $compte->supprimerStatut('MDUFLOT', 'coach');
    $this->assertNotContains('coach', $compte->statutsAdherent('MDUFLOT'));
    $compte->supprimerStatut('MDUFLOT', 'estresponsablemateriel_adh');
    $this->assertNotContains('estresponsablemateriel_adh', $compte->statutsAdherent('MDUFLOT'));
    $compte->supprimerStatut('JDUPOND', 'president');
    $this->assertNotContains('president', $compte->statutsAdherent('MDUFLOT'));

    $compte->supprimerCompte('MDUFLOT');
    $compte->supprimerCompte('JDUPOND');
  }

  public function testStatutsAdherent() {
    $compte = new Compte();
    $compte->creerCompte('Dupond', 'Jean', '2000-10-10', '2022-10-10', 'jdupond', '10102000', 'president', 1, 0, '3 Grande rue, Oullins', '0611223344');
    $compte->creerCompte('Mithy', 'Patrick', '2002-10-10', '2022-10-10', 'pmithy', '10102002', 'entraineur', 1, 1, '3 Grande rue, Oullins', '0611223344');
    $compte->creerCompte('Duflot', 'Martine', '2004-10-10', '2022-10-10', 'mduflot', '10102004', 'coach', 0, 0, '3 Grande rue, Oullins', '0611223344');


    $this->assertContains('president', $compte->statutsAdherent('JDUPOND'));
    $this->assertContains('entraineur', $compte->statutsAdherent('PMITHY'));
    $this->assertContains('coach', $compte->statutsAdherent('MDUFLOT'));
    $this->assertContains('estresponsablemateriel_adh', $compte->statutsAdherent('JDUPOND'));
    $this->assertContains('estresponsableplanning_adh', $compte->statutsAdherent('PMITHY'));

    $compte->supprimerCompte('JDUPOND');
    $compte->supprimerStatut('PMITHY', 'entraineur');
    $compte->supprimerCompte('PMITHY');
    $compte->supprimerStatut('MDUFLOT', 'coach');
    $compte->supprimerCompte('MDUFLOT');
  }

  public function testAjouterStatut() {
    $compte = new Compte();
    $compte->creerCompte('Duflot', 'Martine', '2004-10-10', '2022-10-10', 'mduflot', '10102004', 'simple_adherent', 0, 0, '3 Grande rue, Oullins', '0611223344');
    $compte->ajouterStatut('MDUFLOT', 'coach');
    $this->assertContains('coach', $compte->statutsAdherent('MDUFLOT'));
    $compte->ajouterStatut('MDUFLOT', 'estresponsableplanning_adh');
    $this->assertContains('estresponsableplanning_adh', $compte->statutsAdherent('MDUFLOT'));
    $compte->ajouterStatut('MDUFLOT', 'president');
    $this->assertContains('president', $compte->statutsAdherent('MDUFLOT'));
    $this->assertNotContains('simple_adherent', $compte->statutsAdherent('MDUFLOT'));

    $compte->supprimerStatut('MDUFLOT', 'coach');
    $compte->supprimerCompte('MDUFLOT');
  }

  public function testModifierCompte() {
    $compte = new Compte();
    $compte->creerCompte('Dupond', 'Jean', '2000-10-10', '2022-10-10', 'jdupond', '10102000', 'president', 1, 0, '3 Grande rue, Oullins', '0611223344');
    $compte->modifiercompte('JDUPOND', '12 rue du perron, Oullins', 'secret', '0655667788');
    $adherent = $compte->infosCompte('JDUPOND');
    $this->assertSame('12 rue du perron, Oullins', $adherent['adresse_adh']);
    $this->assertSame('secret', $adherent['mdp_adh']);
    $this->assertSame('0655667788', $adherent['num_telephone_adh']);

    $compte->supprimerCompte('JDUPOND');
  }

  public function testSupprimerCompte() {
    $compte = new Compte();
    $inscription = $compte->creerCompte('Dupond', 'Jean', '2000-10-10', '2022-10-10', 'jdupond', '10102000', 'simple_adherent', 1, 0, '3 Grande rue, Oullins', '0611223344');
    $nbAdherentsActifs = count($compte->listeComptesAdherents(0)->fetchAll());
    $compte->supprimerCompte('JDUPOND');
    $adherentsActifs = $compte->listeComptesAdherents(0)->fetchAll();
    $this->assertSame($nbAdherentsActifs - 1, count($adherentsActifs));
  }
}
