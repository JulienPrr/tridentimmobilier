<?php

abstract class Model
{

  private static $_bdd;

  // CONNEXION A LA BDD
  private static function setBdd()
  {
    self::$_bdd = new PDO('mysql:host=localhost;dbname=agenceimmo;charset=utf8', 'root', '');
    self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
  }

  //fonction de connexion par defaut a la bdd
  protected function getBdd()
  {
    if (self::$_bdd == null) {
      self::setBdd();
      return self::$_bdd;
    }
  }


  // FONCTION RECUPERANT TOUS LES ELEMENT DE LA TABLE
  protected function getAll($table, $obj)
  {
    $this->getBdd();
    $var = [];
    $req = self::$_bdd->prepare('SELECT * FROM ' . $table . ' ORDER BY date_publication desc');
    $req->execute();

    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
      $var[] = new $obj($data);
    }

    return $var;
    $req->closeCursor();
  }

  protected function getAll2($table, $obj)
  {
    $this->getBdd();
    $var = [];
    $req = self::$_bdd->prepare('SELECT * FROM ' . $table);
    $req->execute();

    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
      $var[] = new $obj($data);
    }

    return $var;
    $req->closeCursor();
  }

  protected function getSome($table, $obj)
  {
    $this->getBdd();
    $var = [];
    $req = self::$_bdd->prepare('SELECT * FROM ' . $table . ' ORDER BY date_publication desc LIMIT 10;');
    $req->execute();

    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
      $var[] = new $obj($data);
    }

    return $var;
    $req->closeCursor();
  }

  // FONCTION RECUPERANT L'ELEMENT AYANT UN CERTAIN ID
  protected function getOne($table, $obj, $id)
  {
    $this->getBdd();
    $var = [];
    $req = self::$_bdd->prepare("SELECT * FROM " . $table . " WHERE id = ?");
    $req->execute(array($id));
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
      $var[] = new $obj($data);
    }

    return $var;
    $req->closeCursor();
  }

  protected function createOne($table, $obj)
  {
    $this->getBdd();
    $req = self::$_bdd->prepare("INSERT INTO " . $table . " (prix, superficie, titre, description, adresse, ville, code_postal, numero_etage, nombre_pieces, date_publication, main_image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $date = date('Y-m-d H:i:s');
    $data = array(
      $_POST['prix'],
      $_POST['superficie'],
      $_POST['titre'],
      $_POST['description'],
      $_POST['adresse'],
      $_POST['ville'],
      $_POST['zip'],
      $_POST['numeroEtage'],
      $_POST['nombrePieces'],
      "photo.png",
      $date
    );

    $req->execute($data);
    $req->closeCursor();
    if ($_POST["type_vente"] == "vente") {
      $req = self::$_bdd->prepare("UPDATE " . $table . " SET a_vendre ='1'");
      $req->execute();
      $req->closeCursor();
    }
    if (isset($_POST["meuble"]) && $_POST["meuble"] == "oui") {
      $req = self::$_bdd->prepare("UPDATE " . $table . " SET meuble ='1'");
      $req->execute();
      $req->closeCursor();
    }

    if (isset($_POST["ascensseur"]) && $_POST["ascensseur"] == "oui") {
      $req = self::$_bdd->prepare("UPDATE " . $table . " SET ascensseur ='1'");
      $req->execute();
      $req->closeCursor();
    }

    if (isset($_POST["terasse"]) && $_POST["terasse"] == "oui") {
      $req = self::$_bdd->prepare("UPDATE " . $table . " SET terasse ='1'");
      $req->execute();
      $req->closeCursor();
    }

    if (isset($_POST["balcon"]) && $_POST["balcon"] == "oui") {
      $req = self::$_bdd->prepare("UPDATE " . $table . " SET balcon ='1'");
      $req->execute();
      $req->closeCursor();
    }
  }

  protected function getByUsername($table, $obj, $username)
  {
    $this->getBdd();
    $var = [];
    $req = self::$_bdd->prepare("SELECT * FROM " . $table . " WHERE username = ?");
    $req->execute(array($username));
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
      $var[] = new $obj($data);
    }
    return $var;
    $req->closeCursor();
  }

  protected function getAptAlaUne($table, $obj)
  {
    $this->getBdd();
    $var = [];
    $req = self::$_bdd->prepare("SELECT * FROM " . $table . " WHERE une = 1");
    $req->execute();
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
      $var[] = new $obj($data);
    }
    return $var;
    $req->closeCursor();
  }

  protected function getAppartementsRec($table, $obj)
  {
    $this->getBdd();
    $var = [];
    if (isset($_POST['type_vente']) && $_POST['type_vente'] == "location") {
      $sql = "SELECT * FROM " . $table . " WHERE a_vendre = 0";
    } else {
      $sql = "SELECT * FROM " . $table . " WHERE a_vendre = 1";
    }
    if (isset($_POST['ville'])  && !empty($_POST['ville'])) {
      $ville = "'" . $_POST['ville'] . "'";
      $sql = $sql . " AND ville = " . $ville ;
    }

    if (isset($_POST['prixmax']) && isset($_POST['prixmin']) && !empty($_POST['prixmax'])  && !empty($_POST['prixmin'])) {
      $sql = $sql . " AND prix BETWEEN " . $_POST['prixmin'] . " AND " .  $_POST['prixmax'];
    }

    $req = self::$_bdd->prepare($sql);
    $req->execute();

    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
      $var[] = new $obj($data);
    }
 
    return $var;
    $req->closeCursor();
  }


  protected function storeImage($table, $obj, $id)
  {
    $this->getBdd();
    $sql = "UPDATE  " . $table . " SET  main_image = ? WHERE id=?";
    $req = self::$_bdd->prepare($sql);
    $nom = $_FILES["photo"]["name"];
    $req->execute([$nom, $id]);
  }
}
