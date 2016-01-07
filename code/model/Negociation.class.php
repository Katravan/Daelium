<?php
  class Negociation {
    private $idnegociation;
    private $idbooker;
    private $idmanif;
    private $idgroupe;
    private $idorganisateur;
    private $etat;

    function __construct($idnegociation = NULL, $idbooker = NULL, $idmanif = NULL, $idgroupe = NULL, $idorganisateur = NULL, $etat = NULL) {
      if (!isset($this->idnegociation)) {
        $this->idnegociation = $idnegociation;
      }
      if ($idbooker != NULL) {
          $this->idbooker = $idbooker;
      }
      if ($idmanif != NULL) {
          $this->idmanif = $idmanif;
      }
      if ($idgroupe != NULL) {
          $this->idgroupe = $idgroupe;
      }
      if ($idorganisateur != NULL) {
          $this->idorganisateur = $idorganisateur;
      }
      if ($etat != NULL) {
          $this->etat = $etat;
      }
    }
    // ********************************
  	//        Fonctions getter
  	// ********************************
    function getIdNegociation() {
        return $this->idnegociation;
    }
    function getIdBooker() {
        return $this->idbooker;
    }
    function getIdManif() {
        return $this->idmanif;
    }
    function getIdGroupe() {
        return $this->idgroupe;
    }
    function getIdOrganisateur() {
        return $this->idorganisateur;
    }
    function getetat() {
      if($this->etat == NULL){
        return 0;
      }else {
        return $this->etat;
      }

    }
    function getetatEcrit() {
        if($this->etat == 0 || $this->etat == null){
          return "En Cours";
        }elseif ($this->etat == 1) {
          return "Terminée";
        }elseif ($this->etat == 2) {
          return "Refusée";
        }elseif ($this->etat == 3) {
          return "Acceptée";
        }else {
          return "Erreur Negociation.class";
        }
    }

    // ********************************
    //        Fonctions setter
    // ********************************
    function setIdBooker($idbooker) {
       $this->idbooker = $idbooker;
    }
    function setIdManif($idmanif) {
       $this->idmanif = $idmanif;
    }
    function setIdGroupe($idgroupe) {
       $this->idgroupe = $idgroupe;
    }
    function setIdOrganisateur($idorganisateur) {
       $this->idorganisateur = $idorganisateur;
    }
    function setetat($etat) {
       $this->etat = $etat;
    }

  }
?>
