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
		'Title' => 'Varchar(255)'
	);

	private static $has_one = array(
		'CoverImage' => 'Image',
		'SectionGallery' => 'SectionGallery',
	);

	private static $has_many = array(
		'Images' => 'Image'
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->addFieldToTab('Root.Images', UploadField::create('Images', 'Images', $this->Images()));
		return $fields;
	}

	public function canView($member = null) {
		return true;
	}

	public function canEdit($member = null) {
		return true;
	}

	public function canCreate($member = null) {
		return true;
	}


}
