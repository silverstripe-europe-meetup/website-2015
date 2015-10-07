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
		/** @var GridFieldConfig $gridFieldConfig */
		$gridFieldConfig = GridFieldConfig::create()->addComponents(
			new GridFieldToolbarHeader(),
			new GridFieldAddNewButton('toolbar-header-right'),
			new GridFieldSortableHeader(),
			new GridFieldDataColumns(),
			new GridFieldPaginator(10),
			new GridFieldEditButton(),
			new GridFieldDeleteAction(),
			new GridFieldDetailForm()
		);

		$gridField = new GridField("Galleries", "Galleries", $this->Galleries(), $gridFieldConfig);
		$fields->addFieldToTab("Root.Galleries", $gridField);
		return $fields;
	}

}
