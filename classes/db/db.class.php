<?php 

    class db extends db_orm {

        public static function get_core_master() {

            $dbmanager = new dbmanager();
            return $dbmanager->get_core_master();

        }

        public static function get_core_slave() {

            $dbmanager = new dbmanager();
            return $dbmanager->get_core_slave();

        }

        public function get_all(array $sql) {            

            $sql_string = 'SELECT ';
            $sql_string .= isset($sql['fields']) ? $sql['fields'] : '*';
            $sql_string .= ' FROM ' . $sql['tables'];
            $sql_string .= isset($sql['where']) ? ' WHERE ' . implode(' OR ', $sql['where']) : '';

            $stmt = $this->get_core_master()->prepare($sql_string);
            $stmt->execute($sql['data']);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            return $stmt->fetch();

        }

        public function insert($sql) {

            $query = $this->get_core_master()->prepare('INSERT INTO ' . $sql['tables'] . ' (' . $sql['fields'] . ') VALUES (' . $sql['values'] . ')');
            $query->execute($sql['data']);
        }

    }