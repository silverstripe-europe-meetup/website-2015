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
		'getGallery',
	);

	public function init()
	{
		Requirements::set_backend(new BetterRequirements_Backend());
		parent::init();
		Requirements::set_combined_files_folder(project() . '/_combinedfiles');
		Requirements::set_force_js_to_bottom(true);
		$this->requireJS();
		$this->requireCSS();
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
			$btn = FormAction::create('HandleForm', 'Submit')
		);
		$btn->addExtraClass('button-green-full');
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

	public function requireJS()
	{
		Requirements::javascript('https://maps.googleapis.com/maps/api/js');
		Requirements::combine_files('main.js', [
			PROJECT_THIRDPARTY_DIR . '/composer-bower/jquery.entwine/dist/jquery.entwine-dist.js',
			project() . '/javascript/plugins.js',
			project() . '/javascript/parallax.min.js',
			project() . '/javascript/timer.js',
			project() . '/javascript/gallery.js',
			project() . '/javascript/main.js',
		]);
	}

	public function requireCSS()
	{
		Requirements::combine_files('main.css', [
			project() . '/scss/fonts.scss',
			PROJECT_THIRDPARTY_DIR . '/composer-bower/normalize-css/normalize.css',
			PROJECT_THIRDPARTY_DIR . '/composer-bower/magnific-popup/dist/magnific-popup.css',
			project() . '/scss/screen.scss',
			project() . '/scss/typography.scss',
			project() . '/scss/form.scss',
			project() . '/scss/header.scss',
			project() . '/scss/footer.scss',
			project() . '/scss/layout.scss',
			project() . '/scss/sponsors.scss',
			project() . '/scss/talk.scss',
			project() . '/scss/jquery.fancybox.scss',
			project() . '/scss/jquery.fancybox-thumbs.scss',
			project() . '/scss/gallery.scss',
			project() . '/scss/editor.scss'
		]);
		Requirements::clear(project() . '/css/editor.css');
	}


	public function getGallery()
	{
		$galleryID = (int)$this->getRequest()->postVar('gallery');
		$gallery = Gallery::get()->filter(array('ID' => $galleryID))->first();
		return $this->renderWith('Gallery', $gallery);
	}

	public function onAfterWrite()
	{
		parent::onAfterWrite();
	}
}
