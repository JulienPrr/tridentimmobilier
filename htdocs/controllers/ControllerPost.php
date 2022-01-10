<?php

require_once 'views/View.php';

class ControllerPost
{
  private $_appartementManager;
  private $_view;

  public function __construct()
  {
    if (isset($url) && count($url) < 1) {
      throw new \Exception("Page Introuvable");
    } else if (isset($_GET['create'])) {
      $this->create();
    } else if (isset($_GET['addImage'])) {
      $this->addImage();
    } else if (isset($_GET['status']) && $_GET['status'] == "new") {
      $this->store();
    } else if (isset($_GET['status']) && $_GET['status'] == "newimg") {

      $this->storeImage();
    } else {
      $this->appartement();
    }
  }

  //fonction pour afficher un article
  private function appartement()
  {
    if (isset($_GET['id'])) {
      $this->_appartementManager = new AppartementManager;
      $appartement = $this->_appartementManager->getAppartement($_GET['id']);
      $this->_view = new View('SinglePost');
      $this->_view->generatePost(array('appartement' => $appartement));
    }
  }

  //fonction pour afficher le
  //formulaire de création d'un article
  private function create()
  {
    if (isset($_GET['create'])) {
      $this->_view = new View('CreatePost');
      $this->_view->generateForm();
    }
  }


  //fonction pour insérer un article
  //en bdd
  private function store()
  {
    $this->_appartementManager = new AppartementManager;
    $this->_appartementManager->createAppartement();
    $appartements = $this->_appartementManager->getAppartements();
    $this->_view = new View('Accueil');
    $this->_view->generate(array('appartements' => $appartements));
  }

  private function storeImage()
  {
    
    $uploadIsOk = verifUpload();
    if ($uploadIsOk) {
      $this->_appartementManager = new AppartementManager;
      $this->_appartementManager->storeimg($_GET['id']);
      $appartements = $this->_appartementManager->getAppartements();
      $this->_view = new View('Accueil');
      $this->_view->generate(array('appartements' => $appartements));
    }
  }
  private function addImage()
  {
    if (isset($_GET['addImage'])) {
      $this->_view = new View('AddImage');
      $this->_view->generateUploadForm();
    }
  }
}
