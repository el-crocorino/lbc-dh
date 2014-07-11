<?php

    class search extends search_orm {

        public function __construct(array $data) {

            $this->hydrate($data);

        }

        public function delete() {

        }

        /**
         * Saves existing search
         *
         * @return boolean   db insert successful
         */
        public function save() {

            $db = new db();

            $sql = array();
            $sql['tables'] = 'search';
            $sql['fields'] = 'search_user_id, search_flux_id, search_title, search_updated';
            $sql['values'] = ':search_user_id, :search_flux_id, :search_title, NOW()';
            $sql['data'] = array(
                'search_user_id' => $this->get_username(),
                'search_flux_id' => $this->get_firstname(),
                'search_title' => $this->get_lastname()
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
            $sql['tables'] = 'search';
            $sql['fields'] = 'search_user_id, search_flux_id, search_title, search_updated, search_created';
            $sql['values'] = ':search_user_id, :search_flux_id, :search_title, NOW(), NOW()';
            $sql['data'] = array(
                'search_user_id' => $this->get_username(),
                'search_flux_id' => $this->get_password(),
                'search_title' => $this->get_firstname()
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

            $search_array = array(
                'id' => $this->get_id(),
                'user_id' => $this->get_username(),
                'flux_id' => $this->get_firstname(),
                'title' => $this->get_lastname()
                );

            return $search_array;

        }

        public static function get_user_search_list($user_id) {

            $db = new db();

            $sql = array();
            $sql['tables'] = 'search';
            $sql['where'][] = 'search_user_id = :search_user_id';
            $sql['data'] = array(
                'search_user_id' => $user_id
                );

            dump($sql);
            $search_array = $db->get_all($sql);

            return $search_array;

        }

    }