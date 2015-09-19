<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Contact
 *
 * @author Simon 'Sphere' Erkelens
 */

/**
 * StartGeneratedWithDataObjectAnnotator
 * @property string Name
 * @property string Email
 * @property string Receiver
 * @property string Subject
 * @property string Content
 * @property boolean IsSpam
 * EndGeneratedWithDataObjectAnnotator
 */
class Contact extends DataObject
{

	/**
	 * @var array
	 */
	private static $db = array(
		'Name'     => 'Varchar(255)',
		'Email'    => 'Varchar(255)',
		'Receiver' => 'Varchar(255)',
		'Subject'  => 'Varchar(255)',
		'Content'  => 'Text',
		'IsSpam'   => 'Boolean(false)',
	);

	protected static $to = array(
		'talks@silverstripe-europe.org'    => 'Talks',
		'register@silverstripe-europe.org' => 'Registration',
		'sponsors@silverstripe-europe.org' => 'Sponsoring',
		'info@silverstripe-europe.org'     => 'The team',
	);

	/**
	 *
	 */
	public function onBeforeWrite()
	{
		parent::onBeforeWrite();
	}

	public static function getReceivers()
	{
		return self::$to;
	}

	/**
	 *
	 */
	public function onAfterWrite()
	{
		if (!$this->IsSpam) {
			/** @var Email $mail */
			$mail = Email::create();
			$to = $this->Receiver;
			$this->Target = self::$to[$this->Receiver];
			$mail->setTo($to);
			$mail->setSubject('Contact form submission ' . $this->Subject);
			$mail->setFrom($this->Email);
			$mail->setTemplate('ContactFormPost');
			$mail->populateTemplate($this);
			$mail->send();
		} else {
			$this->delete();
		}
	}
}
