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

        /**
         * Hash user password
         * 
         * @return void
         */
        public function hash_password() {

            $options = [
                'cost' => 12,
            ];
                
            parent::set_password(password_hash($this->get_password(), PASSWORD_BCRYPT, $options));            

        }

        /**
         * Checks if given password matches user password
         * 
         * @param  string $password login password
         * @return boolean           password match
         */
        public function check_password($password) {

            return password_verify($password, $this->get_password());

        }

        /**
         * Checks if username exists
         * 
         * @return boolean username check
         */
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

        /**
         * Saves existing user
         * 
         * @return boolean   db insert successful
         */
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

        /**
         * add new user
         *
         * return void
         */
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

            return false;

        }

        /**
         * Converts user object to array
         * 
         * @return array $user_array user infos
         */
        public function to_array() {

            $user_array = array(
                'id' => $this->get_id(),
                'username' => $this->get_username(),
                'firstname' => $this->get_firstname(),
                'lastname' => $this->get_lastname(),
                'email' => $this->get_email()
                );

            return $user_array;

        }

    }