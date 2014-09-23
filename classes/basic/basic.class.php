<?php 

    class basic {

        public function hydrate(array $data) {

          foreach ($data AS $key => $value) {

            $method = 'set_' . $key;
                
            if (method_exists($this, $method)) {
                $this->$method($value);
            }

          }

        }

    }