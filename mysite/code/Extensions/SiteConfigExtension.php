<?php

/**
 * @author zauberfisch
 * @property \SiteConfig|mysiteSiteConfigExtension owner
 * StartGeneratedWithDataObjectAnnotator
 * @property string FooterContentLeft
 * @property string FooterContentRight
 * @property int LogoID
 * @method Image Logo
 * EndGeneratedWithDataObjectAnnotator
 */
class mysiteSiteConfigExtension extends \DataExtension
{
	private static $db = [
		'FooterContentLeft'  => 'HTMLText',
		'FooterContentRight' => 'HTMLText',
	];

	private static $has_one = array(
		'Logo' => 'Image',
	);

	/**
	 * @param \FieldList $fields
	 */
	public function updateCMSFields(\FieldList $fields)
	{
		$fields->addFieldToTab('Root.Main', UploadField::create('Logo'));
		$fields->removeByName('Theme');
		$fields->addFieldsToTab('Root', [
			new Tab('Footer', _t('SiteConfig.FooterTab', 'Footer')),
		]);
		$fields->addFieldsToTab('Root.Footer', [
			new HtmlEditorField('FooterContentLeft', $this->owner->fieldLabel('FooterContentLeft')),
			new HtmlEditorField('FooterContentRight', $this->owner->fieldLabel('FooterContentRight')),
		]);
	}
}
