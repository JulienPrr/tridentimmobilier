<?

class User
{
    private $_id;
    private $_nom;
    private $_prenom;
    private $_mail;
    private $_username;
    private $_is_admin;
    private $_pass_hash;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    // HYDRATATION
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    // GETTERS
    public function getId()
    {
        return $this->_id;
    }
    public function getNom()
    {
        return $this->_nom;
    }
    public function getPrenom()
    {
        return $this->_prenom;
    }
    public function getMail()
    {
        return $this->_mail;
    }
    public function getUsername()
    {
        return $this->_username;
    }
    public function getIsAdmin()
    {
        return $this->_is_admin;
    }
    public function getPassHash()
    {
        return $this->_pass_hash;
    }

    //SETTERS
    public function setId($id){
        $id = (int) $id ;
        $this->_id = $id;
    }
  
    public function setNom($nom){
        if(is_string($nom))
        $this->_nom = $nom;
    }
    public function setPrenom($prenom){
        if(is_string($prenom))
        $this->_prenom = $prenom;
    }
    public function setMail($mail){
        if(is_string($mail))
        $this->_mail = $mail;
    }
    public function setUsername($username){
        if(is_string($username))
        $this->_username = $username;
    }
    public function setIs_admin($isAdmin){
        if($isAdmin == 0 || $isAdmin == 1)
        $this->_is_admin = $isAdmin;
    }
    public function setPass_hash($passHash){
        if(is_string($passHash))
        $this->_pass_hash = $passHash;
    }   
}
