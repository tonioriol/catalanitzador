<?php namespace App;

class Output
{
	public static function write($string)
	{
		return !empty($string) ? fwrite(STDOUT, $string . "\n") : -1;
	}
}