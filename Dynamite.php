<?php namespace App;

trait Dynamite
{
	private static $instance;

	public static function instance()
	{
		if (!isset(self::$instance)) {
			$reflection     = new \ReflectionClass(__CLASS__);
			self::$instance = $reflection->newInstanceArgs(func_get_args());
		}

		return self::$instance;
	}
	final private function __clone(){}
	final private function __wakeup(){}
}