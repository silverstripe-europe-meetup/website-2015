<?php

/**
 * Created by IntelliJ IDEA.
 * User: Sphere
 * Date: 2-9-2015
 * Time: 19:02
 */

/**
 * StartGeneratedWithDataObjectAnnotator
 * @property string Title
 * @property string URL
 * @property string Type
 * @property string Content
 * @property int LogoID
 * @method Image Logo
 * EndGeneratedWithDataObjectAnnotator
 */
class Sponsor extends DataObject
{
	private static $db = array(
		'Title'   => 'Varchar(255)',
		'URL'     => 'Varchar(255)',
		'Type'    => 'Enum("Platinum,Gold,Silver,Bronze")',
		'Content' => 'HTMLText',
	);

	private static $has_one = array(
		'Logo' => 'Image',
	);

}
