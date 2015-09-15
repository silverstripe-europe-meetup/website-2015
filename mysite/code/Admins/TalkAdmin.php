<?php

/**
 * Created by IntelliJ IDEA.
 * User: Sphere
 * Date: 4-9-2015
 * Time: 22:57
 */
class TalkAdmin extends ModelAdmin
{
	private static $managed_models = array(
		'Talk'
	);

	private static $url_segment = 'talk';

	private static $menu_title = 'Talks';

}
