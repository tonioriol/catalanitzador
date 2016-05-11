<?php namespace App;

//require_once 'Console.php';
//require_once 'Output.php';
//require_once 'System.php';
//require_once 'Input.php';
//require_once 'Str.php';


// check php version, os version and initialize the cli environment
// if ok continue, else exit(-1) (???)
//System::instance()->checkPhp()->checkMacos()->initialize();

// change system languages according to  "--system" option if provided
// else add catalan on top of any other existing languages

// add dictionaries to the system/user folders




Output::write('--' . System::instance()->version() . '--');

//$input = new Input;

//Output::write('Setting system languages to: ' . implode(', ', Input::instance()->options('system')));
//Output::write('defaults write -g AppleLanguages -array ' . implode(', ', Input::instance()->options('system')));
//$output = Console::execute('defaults write -g AppleLanguages -array ' . implode(', ', $input->options('system')));
////Output::write($output);

//Output::write('Setting chrome language to: ' . implode(', ', Input::instance()->options('chrome')));
//Output::write('defaults write com.google.Chrome AppleLanguages -array ' . implode(', ', Input::instance()->options('chrome')));
//$output = shell_exec('defaults write com.google.Chrome AppleLanguages -array ' . $input->options('chrome'));
//Output::write($output);

exit(0);