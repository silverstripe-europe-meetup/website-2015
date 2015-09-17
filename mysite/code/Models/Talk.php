<?php

/**
 * Created by IntelliJ IDEA.
 * User: Sphere
 * Date: 14-9-2015
 * Time: 19:50
 */

/**
 * StartGeneratedWithDataObjectAnnotator
 * @property string Title
 * @property string Speaker
 * @property string Content
 * @property string Room
 * @property string Day
 * @property string Start
 * @property string End
 * @property int ImpressionID
 * @method Image Impression
 * EndGeneratedWithDataObjectAnnotator
 */
class Talk extends DataObject
{

	private static $db = array(
		'Title'   => 'Varchar(255)',
		'Speaker' => 'Varchar(255)',
		'Content' => 'HTMLText',
		'Room'    => 'Varchar(255)',
		'Day'     => 'Enum("Thu,Fri,Sat")',
		'Start'   => 'Time',
		'End'     => 'Time',
	);

	private static $has_one = array(
		'Impression' => 'Image'
	);
}
