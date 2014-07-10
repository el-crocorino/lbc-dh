<?php 

    class user extends user_orm {

        public function __construct(array $data) {

            $this->hydrate($data);

        }

        public function delete() {
            
        }

        /**
         * load user form db with username
         * 
         * @param  string $username username
         * @return object           user object
         */
        public static function load($username) {

            $db = new db();

            $sql = array();
            $sql['tables'] = 'user';            
            $sql['fields'] = 'user_id AS id, user_username AS username, user_password AS password, user_firstname AS firstname, user_lastname AS lastname, user_email AS email , user_updated AS updated , user_created AS created';
            $sql['where'][] = 'user_username = :user_username';
            $sql['data'] = array(
                'user_username' => $username
                ); 

            $result = $db->get_all($sql);

            if (!empty($result)) {
                return new user($result);
            } 

            return false;
            
        }

        public function hash_password() {

            $options = [
                'cost' => 12,
            ];
                
            parent::set_password(password_hash($this->get_password(), PASSWORD_BCRYPT, $options));            

        }

        public function check_password($password) {

            return password_verify($password, $this->get_password());

        }

        public function check_existing_username() {

            $db = new db();

            $sql = array();
            $sql['tables'] = 'user';
            $sql['fields'] = 'user_username';
            $sql['where'][] = 'user_username = :user_username';// . $this->get_username();
            $sql['data'] = array(
                'user_username' => $this->get_username()
                ); 

            if (empty($db->get_all($sql))) {
                return true;
            }
            
            return false;

        }

        public function save() {

            $db = new db();

            $sql = array();
            $sql['tables'] = 'user';
            $sql['fields'] = 'user_username, user_firstname, user_lastname, user_email, user_updated';
            $sql['values'] = ':user_username, :user_firstname, :user_lastname, :user_email, NOW()';
            $sql['data'] = array(
                'user_username' => $this->get_username(),
                'user_firstname' => $this->get_firstname(),
                'user_lastname' => $this->get_lastname(),
                'user_email' => $this->get_email()
                ); 

            if($db->insert($sql)) {
                return true;
            };

        }

        public function add() {

            $db = new db();

            $sql = array();
            $sql['tables'] = 'user';
            $sql['fields'] = 'user_username, user_password, user_firstname, user_lastname, user_email, user_updated, user_created';
            $sql['values'] = ':user_username, :user_password, :user_firstname, :user_lastname, :user_email, NOW(), NOW()';
            $sql['data'] = array(
                'user_username' => $this->get_username(),
                'user_password' => $this->get_password(),
                'user_firstname' => $this->get_firstname(),
                'user_lastname' => $this->get_lastname(),
                'user_email' => $this->get_email()
                ); 

            if($db->insert($sql)) {
                return true;
            };

        }
    }