<?php

    require_once('../classes/user/user.class.php');

    class userTest extends PHPUnit_Framework_TestCase {

        private $user;

        public function setUp() {

        }

        public function testCreateNewUser() {
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

    }