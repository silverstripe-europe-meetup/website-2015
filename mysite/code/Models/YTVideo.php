<?php

/**
 * Created by IntelliJ IDEA.
 * User: Sphere
 * Date: 21-10-2015
 * Time: 13:12
 */

/**
 * StartGeneratedWithDataObjectAnnotator
 * @property string Title
 * @property string Code
 * EndGeneratedWithDataObjectAnnotator
 */
class YTVideo extends DataObject
{
	private static $db = array(
		'Title'     => 'Varchar(255)',
		'Code'      => 'Varchar(255)',
		'SortOrder' => 'Int'
	);
	private static $has_one = array(
		'Galleries' => 'Gallery'
	);

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();
		$fields->removeByName(array('SortOrder'));
		return $fields;
	}

	public function onBeforeWrite()
	{
		parent::onBeforeWrite();
		if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $this->Code, $match)) {
			$this->Code = $match[1];
		}
	}

}
