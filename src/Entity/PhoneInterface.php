<?php

namespace Entity;

Interface PhoneInterface {
	public function getPhone();
   	public function setPhone($phone);

   	public function getAreacode();
   	public function setAreacode($areacode);

   	public function getFullPhone();
}