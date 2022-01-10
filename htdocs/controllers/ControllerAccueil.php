<?php

require_once 'views/View.php';

class ControllerAccueil
{
  private $_appartementManager;
  private $_view;

  public function __construct()
  {
    if (isset($url) && count($url) > 1) {
      throw new \Exception("Page introuvable", 1);
    } else {
      $this->appartements();
    }
  }

  private function appartements()
  {
    $this->_view = new View('Accueil');
    $this->_appartementManager = new AppartementManager();

    $appartementsdsfv = $this->_appartementManager->getSomeAppartements();
    $this->_view->generate(array('appartements' => $appartementsdsfv));
   
  }


  
}
