<?php 

    class user_orm {

    /**
     * dbobject type
     * 
     * @var string
     */
    private $id = NULL;

    /**
     * dbobject type
     * 
     * @var string
     */
    private $username = NULL;

    /**
     * dbobject type
     * 
     * @var string
     */
    private $firstname = NULL;

    /**
     * dbobject type
     * 
     * @var string
     */
    private $lastname = NULL;

    /**
     * dbobject type
     * 
     * @var string
     */
    private $email = NULL;

    /**
     * dbobject type
     * 
     * @var string
     */
    private $created = NULL;

    /**
     * dbobject type
     * 
     * @var string
     */
    private $updated = NULL;

    public function set_id($id) {
        check_int($id, 'id');
        $this->id = $id;
    }

    public function get_id() {
        return $this->id;
    }

    public function set_username($username) {
        check_string($username, 'username');
        $this->username = $username;
    }

    public function get_username() {
        return $this->username;
    }

    public function set_firstname($firstname) {
        check_string($firstname, 'firstname');
        $this->firstname = $firstname;
    }

    public function get_firstname() {
        return $this->firstname;
    }

    public function set_lastname($lastname) {
        check_string($lastname, 'lastname');
        $this->lastname = $lastname;
    }

    public function get_lastname() {
        return $this->lastname;
    }

    public function set_email($email) {
        check_string($email, 'email');
        $this->email = $email;
    }

    public function get_email() {
        return $this->email;
    }

    public function set_created($created) {
        check_string($created, 'created');
        $this->created = $created;
    }

    public function get_created() {
        return $this->created;
    }

    public function set_updated($updated) {
        check_string($updated, 'updated');
        $this->updated = $updated;
    }

    public function get_updated() {
        return $this->updated;
    }

    public function hydrate(array $data) {

      foreach ($data AS $key => $value) {

        $method = 'set_' . ucfirst($key);
            
        if (method_exists($this, $method)) {
            $this->$method($value);
        }

      }

    }

    function __construct(array $data) {

        $this->hydrate($data);

    }


}