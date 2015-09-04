<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of ContactPage
 *
 * @author Simon 'Sphere' Erkelens
 */

/**
 * StartGeneratedWithDataObjectAnnotator
 * @method DataList|Contact[] Contacts
 * EndGeneratedWithDataObjectAnnotator
 */
class SectionContact extends SectionBase
{
	private static /** @noinspection PhpUnusedPrivateFieldInspection */
		$db = array(
		'BackgroundColor' => 'Varchar',
	);
	private static /** @noinspection PhpUnusedPrivateFieldInspection */
		$defaults = array(
		'BackgroundColor' => 'white',
	);

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
		return $return;
	}

	public function ContactForm()
	{
		return Controller::curr()->ContactForm();
	}
}

