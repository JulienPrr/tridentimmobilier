<?php

class ImageManager extends Model
{

  public function getImages(){
    return $this->getAll('images_apt', 'Image');
  }

  public function getImage($id){
      return $this->getOne('images_apt', 'Image', $id);
    }

  public function createAppartement(){
    return $this->createOne('images_apt', 'Image');
  }


  }
