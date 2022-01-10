<?php

require_once 'views/View.php';

class ControllerRecherche
{
  private $_appartementManager;
  private $_view;



  public function __construct()
  {
    if (isset($_GET['plus'])) {
      $this->recherchePlus();
    } else {
      $this->appartements();
    }
  }

  private function appartements()
  {
    $this->_appartementManager = new AppartementManager();
    $appartements = $this->_appartementManager->getAppartements();
    $this->_view = new View('Recherche');
    $this->_view->generateRec(array('appartements' => $appartements));
  }

  private function recherchePlus()
  {
    $this->_appartementManager = new AppartementManager();
    $appartements = $this->_appartementManager->getAppartementsPlus();
    $this->_view = new View('Recherche');
    $this->_view->generateRec(array('appartements' => $appartements));
  }
}
