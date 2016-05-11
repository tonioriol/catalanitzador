<?php namespace App;

class Console {
	public static function execute($command)
	{
		return shell_exec($command);
	}
}