<?php

class InfoManager extends Model
{
  public function getInfos()
  {
    return $this->getAll2('infos', 'Info');
  }
  
  public function getInfo($id)
  {
    return $this->getOne('infos', 'Info', $id);
  }
  

}


