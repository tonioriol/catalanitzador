<?php namespace App;

require_once 'Dynamite.php';

class Input
{
	use Dynamite;
	private $arguments;
	private $options;

	public function __construct()
	{
		$this->getArguments()->parseOptions();
	}

	private function parseOptions()
	{
		foreach ($this->arguments as $argument) {
			if (Str::startsWith($argument, '--') and Str::contains($argument, '=')) {
				$option = explode('=', ltrim($argument, '--'));
				if (count($option) == 2) {
					$this->options[$option[0]] = explode(',', $option[1]);
				}
			}
		}

		return $this;
	}

	private function getArguments()
	{
		if (isset($_SERVER['argv']) && count($_SERVER['argv']) > 0 and realpath($_SERVER['argv'][0]) == __FILE__) {
			$this->arguments = $_SERVER['argv'];
			array_shift($this->arguments);
		} else {
			$this->arguments = $_SERVER['argv'];
		}

		return $this;
	}

	public function options($option = null)
	{
		if (!isset($this->options)) {
			return null;
		}


		if (!isset($option)) {
			return $this->options;
		} elseif (isset($this->options[$option])) {
			return $this->options[$option];
		}
		return null;
	}
}