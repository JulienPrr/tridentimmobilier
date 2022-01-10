<?php

require_once 'views/View.php';

class ControllerLogin
{
  private $_userManager;
  private $_view;

  public function __construct()
  {
    if (isset($url) && isset($_GET['verif'])) {
      $this->verif();
      echo 'ok';  
    } else {
      $this->login();
    }
  }

  // FONCTION APPELLEE QUAND L'UTILISATEUR VALIDE LE FORMULAIRE DE CONNEXION
  public function verif()
  {
    if (isset($_POST['valid_connexion'])) {
      if (isset($_POST['form_username']) && !empty($_POST['form_username']) && isset($_POST['form_password']) && !empty($_POST['form_password'])) {
        $usr =$this->_userManager = new  UserManager;
        $username = (string) $_POST['form_username'];
        $password = $_POST['form_password'];
        $user = $this->_userManager->getUserByUsername($username);
        echo 'ok';  
        
        // $this->_view->generate(array('users' => $user));
       

        if ($user != null) {
          if (password_verify($password, $user['pass_hash'])) {
            echo 'connecté';
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['prenom'] = $user['prenom'];
            $_SESSION['isAdmin'] = $user['is_admin'];
            print_r($_SESSION);
            $this->_view = new View('Accueil');
        
            
          } else {
            echo 'identifiant ou mot de passe incorect';
            $this->_view = new View('Login');
          }
        } else {
          echo 'identifiant ou mot de passe incorect';
          $this->_view = new View('Login');
          
        }
      }
    }
    // $this->_view = new View('Login');
    // $this->_view->generateLoginForm();
  } // fin Verif

  // FONCTION APPELEE QUAND L'UTILISATEUR VEUT SE CONNECTER
  public function login()
  {
    $this->_view = new View('Login');
    $this->_view->generateLoginForm();

  }
} // fin class