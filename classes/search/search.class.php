<?php

    class search extends search_orm {

        public function __construct(array $data) {

            $this->hydrate($data);

        }

        public function delete() {

            $db = new db();

            $sql = array();
            $sql['tables'] = 'search';
            $sql['where'][] = 'search_id = :search_id';
            $sql['data'] = array(
                'search_id' => $this->get_id()
                );

            if($db->delete($sql)) {
                return true;
            };
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
            $sql['fields'] = 'search_user_id, search_title, search_updated';
            $sql['values'] = ':search_user_id, :search_title, NOW()';
            $sql['data'] = array(
                'search_user_id' => $this->get_username(),
                'search_title' => $this->get_title()
                );

            if($db->update($sql)) {
                return true;
            };

        }

        /**
         * Add new search
         *
         * return string $insert_id insert id
         */
        public function add() {

            $db = new db();

            $sql = array();
            $sql['tables'] = 'search';
            $sql['fields'] = 'search_user_id, search_title, search_updated, search_created';
            $sql['values'] = ':search_user_id, :search_title, NOW(), NOW()';
            $sql['data'] = array(
                'search_user_id' => $this->get_user_id(),
                'search_title' => $this->get_title()
                );

            $insert_id = $db->insert($sql);

            if ($insert_id) {
                return $insert_id;
            };

            return false;

        }

        /**
         * load search from db with search id
         * 
         * @param  string $search_id search id
         * @return object           search object
         */
        public static function load($search_id) {

            $db = new db();

            $sql = array();
            $sql['tables'] = 'search';            
            $sql['fields'] = 'search_id AS id, search_user_id AS user_id, search_title AS title, search_updated AS updated, search_created AS created';
            $sql['where'][] = 'search_id = :search_id';
            $sql['data'] = array(
                'search_id' => $search_id
                ); 

            $result = $db->get_row($sql);

            if (!empty($result)) {
                return new search($result);
            } 

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

        /**
         * get formatted date
         * 
         * @param  $string $date date
         * @return $string       formatted date
         */
        public function get_formatted_date($date) {

            check_string($date, 'date');
            $date = new DateTime($date);

            return $date->format('d F Y, H:i');

        }

        /**
         * get formatted created date
         * 
         * @return $string       formatted date
         */
        public function get_formatted_created() {

            return $this->get_formatted_date($this->get_created());

        }

        /**
         * get formatted updated date
         * 
         * @return $string       formatted date
         */
        public function get_formatted_updated() {

            return $this->get_formatted_date($this->get_updated());

        }



    }