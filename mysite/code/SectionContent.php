<?php

/**
 * @author Zauberfisch
 * StartGeneratedWithDataObjectAnnotator
 * @property string BackgroundColor
 * EndGeneratedWithDataObjectAnnotator
 */
class SectionContent extends SectionBase {
	private static $db = [
		'BackgroundColor' => 'Varchar',
	];
	private static $defaults = [
		'BackgroundColor' => 'grey-light',
	];

	public function getCMSFields() {
		$return = parent::getCMSFields();
		$return->addFieldsToTab('Root.Main', [
			new ColorPaletteField('BackgroundColor', $this->fieldLabel('BackgroundColor'), [
				'grey-light' => '#F6F6F6',
				'white' => '#FFF',
				'blue-dark' => '#015790',
			]),
		], 'Content');
		return $return;
	}
}
