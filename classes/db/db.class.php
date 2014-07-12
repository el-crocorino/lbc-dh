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
            $sql_string .= isset($sql['order']) ? ' ORDER BY ' . $sql['order'] : '';
            $sql_string .= isset($sql['limit']) ? ' LIMIT ' . $sql['limit'] : '';

            $stmt = $this->get_core_master()->prepare($sql_string);
            $stmt->execute($sql['data']);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            return $stmt->fetchAll();

        }

        public function get_row(array $sql) {

            $sql_string = 'SELECT ';
            $sql_string .= isset($sql['fields']) ? $sql['fields'] : '*';
            $sql_string .= ' FROM ' . $sql['tables'];
            $sql_string .= isset($sql['where']) ? ' WHERE ' . implode(' OR ', $sql['where']) : '';
            $sql_string .= isset($sql['order']) ? ' ORDER BY ' . $sql['order'] : '';
            $sql_string .= ' LIMIT 0,1';

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