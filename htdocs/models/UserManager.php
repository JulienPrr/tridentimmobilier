<?php

class UserManager extends Model
{
  public function getUsers()
  {
    return $this->getAll2('users', 'User');
  }
  
  public function getUser($id)
  {
    return $this->getOne('users', 'User', $id);
  }
  
  public function getUserByUsername($username)
  {
   return $this->getByUsername('users', 'User', $username);
  }
}


