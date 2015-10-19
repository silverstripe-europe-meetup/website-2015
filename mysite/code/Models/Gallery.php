<?php

/**
 * Created by IntelliJ IDEA.
 * User: Sphere
 * Date: 7-10-2015
 * Time: 15:27
 */

/**
 * StartGeneratedWithDataObjectAnnotator
 * @property string Title
 * @property int SortOrder
 * @property int CoverImageID
 * @property int SectionGalleryID
 * @method Image CoverImage
 * @method SectionGallery SectionGallery
 * @method DataList|Image[] Images
 * EndGeneratedWithDataObjectAnnotator
 */
class Gallery extends DataObject
{
	private static $db = array(
		'Title'     => 'Varchar(255)',
		'SortOrder' => 'Int'
	);

	private static $has_one = array(
		'CoverImage'     => 'Image',
		'SectionGallery' => 'SectionGallery',
	);

	private static $has_many = array(
		'Images' => 'Image'
	);

	private static $default_sort = 'SortOrder ASC';

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();
		$fields->removeByName(array('SortOrder'));
		/** @var GridFieldConfig_RecordEditor $gridFieldConfig */
		$gridFieldConfig = GridFieldConfig_RecordEditor::create();
		$gridFieldConfig->addComponent(new GridFieldBulkUpload());
		$gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));
		$gridFieldConfig->addComponent(new GridFieldGalleryTheme('largeCMSThumbnail'));
		$gridFieldConfig->removeComponentsByType('GridFieldPaginator');
		$gridFieldConfig->removeComponentsByType('GridFieldPageCount');
		$field = GridField::create(
			'Images', 'Images', $this->Images()->sort('SortOrder'), $gridFieldConfig);
		$fields->addFieldToTab('Root.Images', $field);
		return $fields;
	}

	public function canView($member = null)
	{
		return true;
	}

	public function canEdit($member = null)
	{
		return true;
	}

	public function canCreate($member = null)
	{
		return true;
	}


}
