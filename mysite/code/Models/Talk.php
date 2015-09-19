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
 * @property int Room
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
		'Room'    => 'Int',
		'Day'     => 'Enum("Thu,Fri,Sat")',
		'Start'   => 'Time',
		'End'     => 'Time',
	);

	private static $has_one = array(
		'Impression' => 'Image'
	);

	private static $summary_fields = array(
		'Title',
		'Speaker',
		'Day',
		'Start',
		'End'
	);

	public static $rooms = array(
		0 => '',
		1 => 'Design/frontend',
		2 => 'Devops',
		3 => 'Yesterday talks'
	);

	private static $default_sort = 'Day, Start ASC';

	public function getCMSFields()
	{
		/** @var FieldList $fields */
		$fields = parent::getCMSFields();
		$fields->removeByName('Room');
		$fields->addFieldToTab('Root.Main', DropdownField::create('Room', 'Room', self::$rooms));
		return $fields;
	}

	public function roomName() {
		return self::$rooms[$this->Room];
	}
}
