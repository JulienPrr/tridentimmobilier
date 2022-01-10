<?php

class AppartementManager extends Model
{

  public function getAppartements(){
    return $this->getAll('appartements', 'Appartement');
  }

  public function getSomeAppartements(){
    return $this->getSome('appartements', 'Appartement');
  }

  public function getUne(){
    return $this-> getAptAlaUne('appartements', 'Appartement');
  }

  public function getAppartement($id){
      return $this->getOne('appartements', 'Appartement', $id);
    }

  public function createAppartement(){
    return $this->createOne('appartements', 'Appartement');
  }


  public function getAppartementsPlus(){
    return $this->getAppartementsRec('appartements', 'Appartement');
  }

  public function storeImg($id){
    return $this->storeImage('appartements', 'Appartement', $id);
  }

  }
