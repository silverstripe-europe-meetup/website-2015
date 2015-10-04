<?php

/**
 * @author zauberfisch
 * @property \SiteConfig|mysiteSiteConfigExtension owner
 * StartGeneratedWithDataObjectAnnotator
 * @property string FooterContentLeft
 * @property string FooterContentRight
 * EndGeneratedWithDataObjectAnnotator
 */
class mysiteSiteConfigExtension extends \DataExtension
{
	private static $db = [
		'FooterContentLeft'  => 'HTMLText',
		'FooterContentRight' => 'HTMLText',
	];


	/**
	 * @param \FieldList $fields
	 */
	public function updateCMSFields(\FieldList $fields)
	{
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
