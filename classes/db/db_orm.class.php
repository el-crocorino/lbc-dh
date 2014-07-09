<?php

class db_orm {

    /**
     * Db host
     * 
     * @var string
     */
    private $host = NULL;

    /**
     * Db name
     * 
     * @var string
     */
    private $dbname = NULL;

    /**
     * Db user
     * 
     * @var string
     */
    private $user = NULL;

    /**
     * Db password
     * 
     * @var string
     */
    private $password = NULL;

    /**
     * dbobject type
     * 
     * @var string
     */
    private $type = NULL;

    /**
     * pdo db object
     * 
     * @var object
     */
    private $pdo = NULL;

    public function set_host($host) {
        check_string($host, 'host');
        $this->host = $host;
    }

    public function get_host() {
        return $this->host;
    }

    public function set_dbname($dbname) {
        check_string($dbname, 'dbname');
        $this->dbname = $dbname;
    }

    public function get_dbname() {
        return $this->dbname;
    }

    public function set_user($user) {
        check_string($user, 'user');
        $this->user = $user;
    }

    public function get_user() {
        return $this->user;
    }

    public function set_password($password) {
        check_string($password, 'password');
        $this->password = $password;
    }

    public function get_password() {
        return $this->password;
    }

    public function set_type($type) {
        check_string($type, 'type');
        $this->type = $type;
    }

    public function get_type() {
        return $this->type;
    }

    public function set_pdo($pdo) {
        check_string($pdo, 'pdo');
        $this->pdo = $pdo;
    }

    public function get_pdo() {
        return $this->pdo;
    }

    public function __construct($type) {

        check_string($type, 'type');

        try {
            $pdo = new PDO('mysql:host=' . $dConfig['db']['host'] . ', dbname=' . $dConfig['db']['dbname'], $dConfig['db'][$type]['user'], $dConfig['db'][$type]['pass']);
            $this->set_pdo($pdo);
        }

        catch(PDOException $e) {
            echo $e->getMessage();
        }
        
    }

}
