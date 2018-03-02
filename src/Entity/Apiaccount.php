<?php

namespace Entity;

use Config\Api;

class Apiaccount implements ApiaccountInterface {
	public $host;
	public $username;
	public $password;

	function __construct( 
      	$host, 
      	$username,
      	$password
   	){
   		$this->setHost($host);
      	$this->setUsername($username);
      	$this->setPassword($password);
   	}

   	public function getHost(){
        return $this->host;
   	}

   	public function setHost($host){
   		if (empty($host) || is_numeric($host)) {
            throw new \InvalidArgumentException("Host is invalid.");
        }
        $this->host = $host;
   	}

   	public function getUsername(){
        return $this->username;
   	}

   	public function setUsername($username){
   		if (empty($username)) {
            throw new \InvalidArgumentException("Username is empty.");
        }
        $this->username = $username;
   	}

   	public function getPassword(){
        return $this->password;
   	}

   	public function setPassword($password){
   		if (empty($password)) {
            throw new \InvalidArgumentException("Password is empty.");
        }
        $this->password = $password;
   	}
}