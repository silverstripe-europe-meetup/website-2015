<?php

/**
 * Created by IntelliJ IDEA.
 * User: Sphere
 * Date: 2-9-2015
 * Time: 19:06
 */

/**
 * StartGeneratedWithDataObjectAnnotator
 * @property string BackgroundColor
 * @property string AfterContent
 * EndGeneratedWithDataObjectAnnotator
 */
class SectionSponsor extends SectionBase
{
	private
	static $db = [
		'BackgroundColor' => 'Varchar',
		'AfterContent' => 'HTMLText',
	];
	private
	static $defaults = [
		'BackgroundColor' => 'grey-light',
	];

	public
	function getCMSFields()
	{
		$return = parent::getCMSFields();
		$return->addFieldsToTab('Root.Main', [
			new ColorPaletteField('BackgroundColor', $this->fieldLabel('BackgroundColor'), [
				'grey-light' => '#F6F6F6',
				'white'      => '#FFF',
				'blue-dark'  => '#015790',
			]),
		], 'Content');
		$return->addFieldToTab('Root.Main', HtmlEditorField::create('AfterContent', 'Text to appear after the sponsors'));
		return $return;
	}

	public function Sponsors($type = '')
	{
		return Sponsor::get()->filter(array('Type' => $type));
	}
}
