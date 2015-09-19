<?php

/**
 * Created by IntelliJ IDEA.
 * User: Sphere
 * Date: 14-9-2015
 * Time: 19:50
 */

/**
 * StartGeneratedWithDataObjectAnnotator
 * @property string BackgroundColor
 * EndGeneratedWithDataObjectAnnotator
 */
class SectionSchedule extends SectionBase
{

	private static $db = [
		'BackgroundColor' => 'Varchar',
	];
	private static $defaults = [
		'BackgroundColor' => 'grey-light',
	];

	public function getCMSFields()
	{
		$return = parent::getCMSFields();
		$return->addFieldsToTab('Root.Main', [
			new ColorPaletteField('BackgroundColor', $this->fieldLabel('BackgroundColor'), [
				'grey-light' => '#F6F6F6',
				'white'      => '#FFF',
				'blue-dark'  => '#015790',
			]),
		], 'Content');
		return $return;
	}

	public function talks($day)
	{
		return Talk::get()->filter(array('Day' => $day))->sort('Start ASC');
	}

	public function isActive()
	{
		if (date('Y-m-d') <= '2015-08 -15') {
			return 'active';
		} elseif (date('Y-m-d') === '2015-09-17') {
			return 'active';
		} elseif (date('Y-m-d') === '2015-10-17') {
			return 'active';
		}
		return '';
	}
}
