<?php

/**
 * Created by IntelliJ IDEA.
 * User: Sphere
 * Date: 7-10-2015
 * Time: 15:22
 */

/**
 * StartGeneratedWithDataObjectAnnotator
 * @property string BackgroundColor
 * @method DataList|Gallery[] Galleries
 * EndGeneratedWithDataObjectAnnotator
 */
class SectionGallery extends SectionBase
{
	private static /** @noinspection PhpUnusedPrivateFieldInspection */
		$db = array(
		'BackgroundColor' => 'Varchar',
	);

	private static /** @noinspection PhpUnusedPrivateFieldInspection */
		$has_many = array(
		'Galleries' => 'Gallery'
	);

	private static /** @noinspection PhpUnusedPrivateFieldInspection */
		$defaults = array(
		'BackgroundColor' => 'white',
	);

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();
		$fields->addFieldsToTab('Root.Main', [
			ColorPaletteField::create('BackgroundColor', $this->fieldLabel('BackgroundColor'), [
				'grey-light' => '#F6F6F6',
				'white'      => '#FFF',
				'blue-dark'  => '#015790',
			]),
		], 'Content');

		$gridFieldConfig = GridFieldConfig_RecordEditor::create();
		$gridFieldConfig->addComponent(new GridFieldOrderableRows('SortOrder'));
		$field = GridField::create(
			'Galeries', 'Galleries', $this->Galleries()->sort('SortOrder'), $gridFieldConfig);

		$fields->addFieldToTab("Root.Galleries", $field);
		return $fields;
	}

}
