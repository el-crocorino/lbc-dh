<?php 

    class db extends db_orm {

        public function get_core_master() {

            $dbmanager = new dbmanager();
            return $dbmanager->get_core_master();

        }

        public function get_core_slave() {

            $dbmanager = new dbmanager();
            return $dbmanager->get_core_slave();

        }

        public function get_all(array $sql) {

            $sql = 'SELECT ';
            $sql .= isset($sql['fields']) ? $sql['fields'] : '*' ;
            $sql .= ' FROM ';
            $sql .= isset($sql['tables']) ? $sql['fields'] : '' ;

            if (isset($sql['where'])) {
                $sql .= ' WHERE ';
                $sql .= implode(' OR ', $sql['where']);
            }

            if (isset($sql['order'])) {
                $sql .= ' ORDER BY ';
                $sql .= $sql['order'];
            }

            $sql .= ';';

            var_dump($sql);

            $result = $this->get_core_slave()->query($sql);
            $result->setFetchMode(PDO::FETCH_OBJ);

            return $result;
        }

    }