<?php

global $project;
$project = 'mysite';

// use the _ss_environment.php file for configuration
require_once('conf/ConfigureFromEnv.php');

// set default language
i18n::set_locale('en_US');

// Force redirect to www

define('PROJECT_THIRDPARTY_DIR', project() . '/thirdparty');
define('PROJECT_THIRDPARTY_PATH', BASE_PATH . '/' . PROJECT_THIRDPARTY_DIR);
if (Director::isLive()) {
	// we are in live mode, send errors per email
	Director::forceWWW();
	SS_Log::add_writer(new SS_LogEmailWriter('info@silverstripe-europe.org'), SS_Log::ERR);
}
