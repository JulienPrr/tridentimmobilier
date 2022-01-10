<?php
require_once 'views/View.php';

class ControllerPost
{
  
  private $_contactManager;
  private $_view;

  public function __construct()
  {
    if (isset($url) && count($url) > 1) {
      throw new \Exception("Page introuvable", 1);
    } else {
      $this->contacts();
    }
  }

 
  private function contacts()
  {
    $this->_contactManager = new ContactManager();
    $contacts = $this->_contactManager->getContacts();
    $this->_view = new View('Contact');
    $this->_view->generate(array('contacts' => $contacts));
  }




}

 ?>
