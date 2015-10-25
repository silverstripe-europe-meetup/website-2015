<?php

/**
 * Created by IntelliJ IDEA.
 * User: Sphere
 * Date: 4-9-2015
 * Time: 22:57
 */
class ContactAdmin extends ModelAdmin
{
    private static $managed_models = array(
        'Contact'
    );

    private static $url_segment = 'contact';

    private static $menu_title = 'Contact';

}
