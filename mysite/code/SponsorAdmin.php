<?php

/**
 * Created by IntelliJ IDEA.
 * User: Sphere
 * Date: 2-9-2015
 * Time: 19:11
 */
class SponsorAdmin extends ModelAdmin
{
	private static $managed_models = array(
		'Sponsor'
	);

	private static $menu_title = 'Sponsors';

	private static $url_segment = 'sponsors';

}
