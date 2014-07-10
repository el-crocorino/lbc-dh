<?php 

    class user extends user_orm {

        public function __construct(array $data) {

            $this->hydrate($data);

        }

        public function add() {

        }

        public function delete() {
            
        }

        public function load($username) {

            check_string($username);

            $sql = array();
            $sql['tables'] = 'user';
            $sql['where'][] = 'user_username = "' . $username . '"';

            $db = db::get_core_slave();

            $db->get_all($sql);
            
        }

        public function set_password($password) {

            check_string($password, 'password');

            $options = [
                'cost' => 12,
            ];
            
            parent::set_password(password_hash($password, PASSWORD_BCRYPT, $options));

        }

        public function check_password($password) {

            if (password_verify($password, $this->get_password())) {
                return true;
            }

            return false;

        }

        public function check_username() {

        }

        public function save() {

            $db = new db();

            $sql = array();
            $sql['tables'] = 'user';
            $sql['fields'] = 'user_username, user_password, user_firstname, user_lastname, user_email, user_updated';
            $sql['values'] = ':user_username, :user_password, :user_firstname, :user_lastname, :user_email, NOW()';
            $sql['data'] = array(
                'user_username' => $this->get_username(),
                'user_password' => $this->get_password(),
                'user_firstname' => $this->get_firstname(),
                'user_lastname' => $this->get_lastname(),
                'user_email' => $this->get_email()
                ); 

            if (empty($this->get_created())) {
                $sql['fields'] .= ', user_created';
                $sql['values'] .= ', NOW()';
                #$sql['data']['user_created'] .= 'NOW()';
            }

            if($db->insert($sql)) {
                return true;
            };

        }
    }