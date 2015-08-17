<?php

/**
 * @author zauberfisch
 * Workaround to remove CMS Help Button
 * @property \LeftAndMain|mysiteLeftAndMainExtension owner
 */
class mysiteLeftAndMainExtension extends \LeftAndMainExtension {
	public function init() {
		parent::init();
		CMSMenu::remove_menu_item('Help');
	}

}
