<?php
    function isConnected($session) {
        if(isset($_SESSION['id']) and isset($_SESSION['role'])) {
            return true;
        }
        else {
            return false;
        }
    }

    function adapterStatuts($statuts) {
      $statutsAdapte = array();
      foreach ($statuts as $statut) {
        switch ($statut) {
          case 'simple_adherent':
            array_push($statutsAdapte, 'Adhérent');
            break;
          case 'president':
            array_push($statutsAdapte, 'Président');
            break;
          case 'president_adjoint':
            array_push($statutsAdapte, 'Président Adjoint');
            break;
          case 'secretaire':
            array_push($statutsAdapte, 'Secrétaire');
            break;
          case 'secretaire_adjoint':
            array_push($statutsAdapte, 'Secrétaire Adjoint');
            break;
          case 'tresorier':
            array_push($statutsAdapte, 'Trésorier');
            break;
          case 'estresponsablemateriel_adh':
            array_push($statutsAdapte, 'Responsable Matériel');
            break;
          case 'estresponsableplanning_adh':
            array_push($statutsAdapte, 'Responsable Planning');
            break;
          default:
            array_push($statutsAdapte, ucfirst($statut));
          }
      }
      return $statutsAdapte;
    }

    function adapterStatutsReverse($statut) {
      switch ($statut) {
        case 'Adhérent':
          return 'simple_adherent';
        case 'Président':
          return 'president';
        case 'Président Adjoint':
          return 'president_adjoint';
        case 'Secrétaire':
          return 'secretaire';
        case 'Secrétaire Adjoint':
          return 'secretaire_adjoint';
        case 'Trésorier':
          return 'tresorier';
        case 'Responsable Matériel':
          return 'estresponsablemateriel_adh';
        case 'Responsable Planning':
          return 'estresponsableplanning_adh';
        default:
          return $statut;
      }
      return $statutsAdapte;
    }
?>
