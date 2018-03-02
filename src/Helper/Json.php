<?php

namespace Helper;

class Json {
	public static function decodeEncodeJson($data){
		$data = json_decode($data, true);
		return json_encode($data, true);
	}
}