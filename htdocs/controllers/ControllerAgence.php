<?php

require_once 'views/View.php';

class ControllerAgence
{
  private $_infoManager;
  private $_view;

  public function __construct()
  {
    if (isset($url) && count($url) > 1) {
      throw new \Exception("Page introuvable", 1);
    } else {
      $this->infos();
    }
  }

  private function infos()
  {
    $this->_infoManager = new InfoManager();
    $infos = $this->_infoManager->getinfos();
    $this->_view = new View('Agence');
    $this->_view->generate(array('infos' => $infos));
  }


  
}
