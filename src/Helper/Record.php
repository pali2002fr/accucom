<?php

namespace Helper;
use \Datetime;

class Record {
	public static function remainder($expired_at){
		$remainder = [];
		$now = new DateTime("now");
		$expired_at = new DateTime($expired_at);
		$interval = $now->diff($expired_at);

		$hours = $interval->format("%h");
		$minutes = $interval->format("%i");
		$seconds = $interval->format("%s");
		if($hours > 0){
			$remainder['hours'] = $hours . ' hours';
		}
		if($minutes > 0){
			$remainder['minutes'] = $minutes . ' minutes';
		}
		if($seconds > 0){
			$remainder['seconds'] = $seconds . ' seconds';
		}
		return join(', ', $remainder);
	}
}