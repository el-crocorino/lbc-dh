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
                'search_flux_id' => $this->get_flux_id(),
                'search_title' => $this->get_title()
                );

            if($db->insert($sql)) {
                return true;
            };

        }

        /**
         * Ddd new search
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
                'search_user_id' => $this->get_user_id(),
                'search_flux_id' => $this->get_flux_id(),
                'search_title' => $this->get_title()
                );

            if($db->insert($sql)) {
                return true;
            };

            return false;

        }

        /**
         * Converts search object to array
         *
         * @return array $search_array search infos
         */
        public function to_array() {

            $search_array = array(
                'id' => $this->get_id(),
                'user_id' => $this->get_user_id(),
                'flux_id' => $this->get_flux_id(),
                'title' => $this->get_title()
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

            $search_array = $db->get_all($sql);

            return $search_array;

        }

    }