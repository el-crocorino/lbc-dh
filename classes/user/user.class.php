<?php 

    class user extends user_orm {

        public function __construct(array $data) {

            $this->hydrate($data);

        }

        public function add() {

        }

        public function save() {
            
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
    }