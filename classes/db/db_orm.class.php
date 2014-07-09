<?php

class db_orm extends basic {

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
     * master PDO Object
     * 
     * @var string
     */
    private $core_master = NULL;

    /**
     * slave PDO Object
     * 
     * @var object
     */
    private $core_slave = NULL;

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

    public function set_core_master(array $user_data) {

        try {
            $pdo = new PDO('mysql:host=' . $this->get_host() . ';dbname=' . $this->get_dbname(), $user_data['user'], $user_data['pass']);    
            $this->core_master = $pdo;
        }
        
        catch( PDOException $e) {
            echo $e->getMessage();
        }
        
    }

    public function get_core_master() {
        return $this->core_master;
    }

    public function set_core_slave(array $user_data) { 

        try {                 
            $pdo = new PDO('mysql:host=' . $this->get_host() . ';dbname=' . $this->get_dbname(), $user_data['user'], $user_data['pass']);
            $this->core_master = $pdo;
        }
        
        catch( PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function get_core_slave() {
        return $this->core_slave;
    }

    public function __construct($data) {

        $data = array(
            "host" => $data['host'],
            "dbname" => $data['dbname'],
            "core_master" => $data['master'],
            "core_slave" => $data['slave']);

        $this->hydrate($data);
    }

}
