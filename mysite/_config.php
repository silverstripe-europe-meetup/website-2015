<?php

global $project;
$project = 'mysite';

// use the _ss_environment.php file for configuration
require_once('conf/ConfigureFromEnv.php');

// set default language
i18n::set_locale('en_US');

define('PROJECT_THIRDPARTY_DIR', project() . '/thirdparty');
define('PROJECT_THIRDPARTY_PATH', BASE_PATH . '/' . PROJECT_THIRDPARTY_DIR);
if (Director::isLive()) {
	if(strpos(Director::absoluteBaseURL(), 'silverstripe-europe.org') !== false || strpos(Director::absoluteBaseURL(), 'www') !== false) {
		$response = new SS_HTTPResponse();
		$response->redirect('https://stripecon.eu', 301);

		HTTP::add_cache_headers($response);

		$response->output();
		die;
	}
	// we are in live mode, send errors per email, set cache and force WWW
	HTTP::set_cache_age(3600); // HTTP Header for CloudFlare Caching
	SS_Cache::set_cache_lifetime('any', 10800); // Serverside cache to 3 hours.
	SS_Log::add_writer(new SS_LogEmailWriter('info@silverstripe-europe.org'), SS_Log::ERR);
}
Config::inst()->update('HtmlEditorField', 'use_gzip', false);
