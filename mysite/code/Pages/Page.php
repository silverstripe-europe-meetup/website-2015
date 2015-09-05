<?php

/**
 * @author zauberfisch
 */
class Page extends \SiteTree
{
	/**
	 * @return \FieldList
	 */
	public function getSettingsFields()
	{
		$fields = parent::getSettingsFields();
		$fields->removeByName('ShowInSearch');
		return $fields;
	}
}

/**
 * @author zauberfisch
 * @property Page dataRecord
 * @method Page data
 */
class Page_Controller extends \ContentController
{
	private static $allowed_actions = array(
		'ContactForm',
	);

	public function init()
	{
		Requirements::set_backend(new BetterRequirements_Backend());
		parent::init();
		Requirements::javascript('https://maps.googleapis.com/maps/api/js');
		Requirements::set_combined_files_folder(project() . '/_combinedfiles');
		Requirements::combine_files('main.js', [
			PROJECT_THIRDPARTY_DIR . '/composer-bower/jquery/dist/jquery.min.js',
			PROJECT_THIRDPARTY_DIR . '/composer-bower/jquery.entwine/dist/jquery.entwine-dist.js',
			PROJECT_THIRDPARTY_DIR . '/composer-bower/magnific-popup/dist/jquery.magnific-popup.min.js',
			project() . '/javascript/parallax.min.js',
			project() . '/javascript/plugins.js',
			project() . '/javascript/timer.js',
			project() . '/javascript/main.js',
		]);
		// insert modernizr into <head> for html5shiv to work
		Requirements::insertHeadTags(sprintf(
			'<script src="%s"></script>',
			PROJECT_THIRDPARTY_DIR . '/modernizr/modernizr.min.js'
		));

		Requirements::combine_files('main.css', [
			PROJECT_THIRDPARTY_DIR . '/composer-bower/normalize-css/normalize.css',
			PROJECT_THIRDPARTY_DIR . '/composer-bower/magnific-popup/dist/magnific-popup.css',
			project() . '/scss/screen.scss',
			project() . '/scss/typography.scss',
			project() . '/scss/form.scss',
			project() . '/scss/header.scss',
			project() . '/scss/footer.scss',
			project() . '/scss/layout.scss',
			project() . '/scss/sponsors.scss',
			project() . '/scss/legacy.scss',
		]);
		Requirements::css(project() . '/scss/print.scss', 'print');
		Requirements::css(project() . '/scss/editor.scss');
		Requirements::clear(project() . '/css/editor.css');
		Requirements::css('//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700');
	}


	public function ContactForm()
	{
		$FieldList = FieldList::create(
			array(
				$name = TextField::create('Name', 'Your name'),
				$mail = EmailField::create('Email', 'Your email address'),
				$subj = TextField::create('Subject', 'Subject'),
				$rece = DropdownField::create('Receiver', 'Who to contact', Contact::getReceivers()),
				LiteralField::create('', '<div class="clearfix"></div>'),
				$area = TextareaField::create('Content', 'Message'),
			)
		);
		$Action = FieldList::create(
			$btn = FormAction::create('HandleForm', 'Send')
		);
		$btn->addExtraClass('btn btn-sm btn-default');
		$Required = RequiredFields::create(
			array(
				'Name',
				'Email',
				'Receiver',
				'Subject',
				'Content',
			)
		);
		$Form = Form::create($this, 'ContactForm', $FieldList, $Action, $Required);
		$Form->flashMessage = Session::get('ThanksMessage');

		return $Form;
	}

	/**
	 * @param array $data
	 * @param Form $form
	 * @throws ValidationException
	 * @throws null
	 */
	public function HandleForm($data, $form)
	{
		/** @var Contact $Contact */
		$Contact = Contact::create();
		$form->saveInto($Contact);
		$Contact->write();
		Session::set('ThanksMessage', true);
		$this->redirect($this->Link() . '#section-contact');
	}

	public function isLive()
	{
		return Director::isLive();
	}
}
