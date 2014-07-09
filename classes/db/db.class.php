<?php 

    class db extends db_orm {

        public static function get_core_master() {
            parent::construct('master');
        }

        public static function get_core_slave() {
            parent::construct('slave');
        }

    }