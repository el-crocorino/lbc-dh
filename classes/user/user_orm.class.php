<?php 

    class user_orm extends basic {

    /**
     * user id
     * 
     * @var string
     */
    private $id = NULL;

    /**
     * user username
     * 
     * @var string
     */
    private $username = NULL;

    /**
     * user password
     * 
     * @var string
     */
    private $password = NULL;

    /**
     * user firstname
     * 
     * @var string
     */
    private $firstname = NULL;

    /**
     * user lastname
     * 
     * @var string
     */
    private $lastname = NULL;

    /**
     * user email
     * 
     * @var string
     */
    private $email = NULL;

    /**
     * user creation date
     * 
     * @var string
     */
    private $created = NULL;

    /**
     * user update date
     * 
     * @var string
     */
    private $updated = NULL;

    public function set_id($id) {
        check_string($id, 'id');
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

    public function set_password($password) {
        check_string($password, 'password');
        $this->password = $password;
    }

    public function get_password() {
        return $this->password;
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


}