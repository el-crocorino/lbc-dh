<?php 

    class user extends user_orm {

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
            $sql['where'][] = 'username = "' . $username . '"';

            $db = db::get_core_slave();

            $db->get_all($sql);
            
        }
    }