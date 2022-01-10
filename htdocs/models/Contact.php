<?

class Contact
{
    private $_facebook;
    private $_instagram;
    private $_mail;
    private $_telephone;

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
    public function getFacebook()
    {
        return $this->_facebook;
    }
    public function getInstagram()
    {
        return $this->_instagram;
    } 
    public function getMail()
    {
        return $this->_mail;
    }
    public function getTelephone()
    {
        return $this->_telephone;
    }

    //SETTERS
    public function setFacebook($facebook){
        if(is_string($facebook))
        $this->_facebook = $facebook;
    }
    public function setInstagram($instagram){
        if(is_string($instagram))
        $this->_instagram = $instagram;
    }
    public function setMail($mail){
        if(is_string($mail))
        $this->_mail = $mail;
    }
    public function setTelephone($tel){
        if(is_string($tel))
        $this->_telephone = $tel;
    }

}
