<?php

class ContactManager extends Model
{
  public function getContacts()
  {
    return $this->getAll('contacts', 'Contact');
  }
  

}

?>


