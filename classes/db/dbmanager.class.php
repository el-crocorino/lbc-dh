<?php

class dbmanager extends basic {

    /**
     * db config
     * 
     * @var array
     */
    private $dbconfig = NULL;

    /**
     * master PDO Object
     * 
     * @var PDO object
     */
    private $core_master = NULL;

    /**
     * slave PDO Object
     * 
     * @var PDO object 
     */
    private $core_slave = NULL;


    public function set_dbconfig(array $dbconfig) {
        $this->dbconfig = $dbconfig;
    }

    public function get_dbconfig() {
        return $this->dbconfig;
    }

    public function set_core_master() {

        $dbconf = $this->get_dbconfig();

        try {

            $pdo = new PDO('mysql:host=' . $dbconf['host'] . ';dbname=' . $dbconf['dbname'], $dbconf['master']['user'], $dbconf['master']['pass']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->core_master = $pdo;
        }
        
        catch( PDOException $e) {
            echo $e->getMessage();
        }
        
    }

    public function get_core_master() {

        if(empty($this->core_master)) {
            $this->set_core_master();
        }

        return $this->core_master;
    }

    public function set_core_slave() {

        $dbconf = $this->get_dbconfig();

        try {    

            $pdo = new PDO('mysql:host=' . $dbconf['host'] . ';dbname=' . $dbconf['dbname'], $dbconf['slave']['user'], $dbconf['slave']['pass']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $this->core_master = $pdo;
        }
        
        catch( PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function get_core_slave() {

        if(empty($this->core_slave)) {
            $this->set_core_slave();
        }

        return $this->core_slave;
    }

    public function __construct() {
        $this->set_dbconfig(get_config('db'));
    }
}