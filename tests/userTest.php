<?php

    
    require_once('../includes/functions.php');
    require_once('../includes/load.php');

    require_once('../classes/basic/basic.class.php');
    require_once('../classes/user/user_orm.class.php');
    require_once('../classes/user/user.class.php');

    class userTest extends PHPUnit_Framework_TestCase {

        private $user;

        public function setUp() {

            $data = array(
                'id' => '1',
                'username' => 'Toto',
                'password' => 'tata',
                'firstname' => 'Toto',
                'lastname' => 'Testmeyer',
                'email' => 'toto@testmeyer.de',
                'created' => '2014-03-17',
                'updated' => '2014-06-17'
                );
            
            $this->user = new user($data);

        }

        public function testPasswordVerify() {

            $this->user->hash_password();
            $this->assertTrue($this->user->check_password('tata', $this->user->get_password()));

        }

        public function testToArray() {

        }

    }