<?php

/**
 * @author zauberfisch
 */
class SectionBase extends Page
{
    private static $allowed_children = 'none';
    private static $can_be_root = false;
    public $SectionHTMLTag = 'section';

    public function getCMSFields()
    {
        $return = parent::getCMSFields();
        $return->removeByName('Metadata');
        $return->removeByName('GoogleSitemap');
        $return->addFieldsToTab('Root.Main', [
            (new CheckboxField('ShowInMenus', $this->fieldLabel('ShowInMenus')))
                ->setAttribute('style', 'margin-left: -184px;'),
        ], 'URLSegment');
        return $return;
    }

    public function canCreate($member = null)
    {
        if ($this->class == __CLASS__) {
            return false;
        }
        return parent::canCreate($member);
    }

    protected function onBeforeWrite()
    {
        parent::onBeforeWrite();
        $this->Priority = -1;
    }

    public function SectionHolderControllerInit()
    {
    }

    /**
     * Render this Page for $LayoutSection
     * @return \HTMLText
     */
    public function LayoutSection()
    {
        $templates = SSViewer::get_templates_by_class(
            get_class($this),
            '',
            'SiteTree'
        );
        foreach ($templates as &$template) {
            $template = "Section/$template";
        }
        return $this->renderWith(new SSViewer($templates));
    }

    /**
     * @param null $action
     * @return string
     */
    public function Link($action = null)
    {
        if ((is_null($action) || is_bool($action)) && $this->getParent()) {
            return $this->getParent()->Link() . '#section-' . $this->URLSegment;
        }
        return parent::Link($action);
    }

    /**
     * @param string $action
     * @return string
     */
    public function PreviewLink($action = null)
    {
        if ($this->getParent() && ($this->getParent()->is_a('SectionHolderPage'))) {
            return $this->Link("sectionframe?action=$action");
        }
        return parent::PreviewLink($action);
    }

    public function SectionClasses()
    {
        $classes = [];
        foreach (array_reverse(ClassInfo::ancestry($this->class)) as $class) {
            if ($class == __CLASS__) {
                break;
            }
            $classes[] = "section-type-$class";
        }
        return implode(' ', $classes);
    }
}

/**
 * @author zauberfisch
 * @property SectionBase dataRecord
 * @method SectionBase data
 */
class SectionBase_Controller extends \Page_Controller
{
    private static $allowed_actions = [
        'sectionframe',
    ];

    public function sectionframe(\SS_HTTPRequest $r)
    {
        return sprintf(
            '<iframe frameborder="0" src="%s"></iframe><style>%s</style>',
            \Controller::join_links(
                $this->data()->getParent()->Link($r->getVar('action'))
            //, "#section-{$this->data()->URLSegment}"
            ),
            '* { margin: 0; padding: 0; width: 100%; height: 100%; }'
        );
    }
}
