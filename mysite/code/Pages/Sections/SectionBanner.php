<?php

/**
 * @author Zauberfisch
 * StartGeneratedWithDataObjectAnnotator
 * @property string Size
 * @property string BackgroundColor
 * @property int BackgroundImageID
 * @method Image BackgroundImage
 * EndGeneratedWithDataObjectAnnotator
 */
class SectionBanner extends SectionBase {
	private static $db = [
		'Size' => 'Varchar',
		'BackgroundColor' => 'Varchar',
	];
	private static $has_one = [
		'BackgroundImage' => 'Image',
	];
	private static $defaults = [
		'Size' => 'small',
		'BackgroundColor' => 'transparent',
	];

	public function getCMSFields() {
		$return = parent::getCMSFields();
		$return->addFieldsToTab('Root.Main', [
			new ColorPaletteField('BackgroundColor', $this->fieldLabel('BackgroundColor'), [
				// todo this hack might break at some point
				'transparent' => '#FFF; background-image: linear-gradient(45deg, grey 25%, transparent 25%, transparent 75%, grey 75%, grey), linear-gradient(45deg, grey 25%, transparent 25%, transparent 75%, grey 75%, grey); background-size: 20px 20px; background-position: 0 0, 10px 10px;',
				'blue' => '#015790; background-color: rgba(1, 87, 144, .5);',
			]),
			new DropdownField('Size', $this->fieldLabel('Size'), [
				'small' => _t('SectionBanner.SizeSmall', 'small'),
				'medium' => _t('SectionBanner.SizeMedium', 'medium'),
				'large' => _t('SectionBanner.SizeLarge', 'large'),
				'full' => _t('SectionBanner.SizeFull', 'full'),
			]),
			(new UploadField('BackgroundImage', $this->fieldLabel('BackgroundImage')))
				->setAllowedFileCategories('image')
				->setFolderName('banner'),
		]);
		return $return;
	}
}
