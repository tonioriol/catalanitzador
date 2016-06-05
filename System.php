<?php namespace App;

require_once 'Console.php';
require_once 'Dynamite.php';

class System
{
	use Dynamite;

	private $version;
	private $versionNumberPattern = '/^\d{1,2}.\d{1,2}.\d{1,2}$/';

	public function __construct()
	{
		$this->setVersion();
	}

	public function setVersion()
	{
		$version = Console::execute('sw_vers -productVersion');

		if (preg_match($this->versionNumberPattern, $version)) {
			$this->version = trim($version);
		}

		$this->version = null;
	}

	public function getVersion()
	{
		return $this->version;
	}

	public function checkSystem()
	{
		return version_compare($this->getVersion(), '', '<=');
	}

	/**
	 * Checks if the php runtime is capable of run. If so, setup it.
	 *
	 * @return $this
	 */
	private function checkPhp()
	{
		if (version_compare(phpversion(), '4.3.0', '<') || php_sapi_name() == 'cgi') {
			$this->setupPhp();
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Sets up CLI environment based on SAPI and PHP version
	 */
	public function setupPhp()
	{
		// Handle output buffering
		@ob_end_flush();
		ob_implicit_flush(true);

		// PHP ini settings
		set_time_limit(0);
		ini_set('track_errors', true);
		ini_set('html_errors', false);
		ini_set('magic_quotes_runtime', false);

		// Define stream constants
		define('STDIN', fopen('php://stdin', 'r'));
		define('STDOUT', fopen('php://stdout', 'w'));
		define('STDERR', fopen('php://stderr', 'w'));

		// Close the streams on script termination
		register_shutdown_function(create_function('', 'fclose(STDIN); fclose(STDOUT); fclose(STDERR); return true;'));
	}

	public function check()
	{
		if ($this->checkPhp() and $this->checkSystem()) {
			return $this;
		} else {
			exit("System not compatible");
		}
	}
}