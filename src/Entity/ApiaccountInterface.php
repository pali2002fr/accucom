<?php

namespace Entity;

interface ApiaccountInterface {
	public function getUsername();
   	public function setUsername($username);

   	public function getPassword();
   	public function setPassword($password);

   	public function getHost();
   	public function setHost($host);
}