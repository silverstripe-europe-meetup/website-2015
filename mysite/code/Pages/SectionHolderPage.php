<?php

/**
 * @author zauberfisch
 * @method SectionBase[]|\ArrayList AllChildren
 * @method SectionBase[]|\ArrayList Children
 */
class SectionHolderPage extends Page {
	private static $allowed_children = [
		'SectionBase',
	];

	public function getCMSFields() {
		$return = parent::getCMSFields();
		$return->removeByName('Content');
		return $return;
	}

	protected $_cachedLayoutSections;

	/**
	 * Get list of all Pages to be displayed as LayoutSection
	 * @return \ArrayList|\SiteTree[]
	 */
	public function LayoutSections() {
		if (!$this->_cachedLayoutSections) {
			$this->_cachedLayoutSections = new \ArrayList();

			foreach ($this->AllChildren() as $child) {
				if ($child->canView()) { // && $child->is_a('SectionBase')
					if ($child->hasMethod('SectionHolderControllerInit')) {
						$child->SectionHolderControllerInit();
					}
					$this->_cachedLayoutSections->push($child);
				}
			}
		}
		return $this->_cachedLayoutSections;
	}

	public function LayoutSectionsMenu() {
		return $this->LayoutSections()->filterByCallback(function ($child) {
			return !!$child->ShowInMenus;
		});
	}
}

/**
 * @author zauberfisch
 * @property SectionHolderPage dataRecord
 * @method SectionHolderPage data
 */
class SectionHolderPage_Controller extends Page_Controller {
}
