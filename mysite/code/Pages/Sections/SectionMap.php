<?php

/**
 * @author zauberfisch
 * StartGeneratedWithDataObjectAnnotator
 * @property string Latitude
 * @property string Longitude
 * @property string Size
 * EndGeneratedWithDataObjectAnnotator
 */
class SectionMap extends SectionBase
{
    private static $db = [
        'Latitude'  => 'Varchar',
        'Longitude' => 'Varchar',
        'Size'      => 'Varchar',
    ];
    private static $defaults = [
        'Size' => 'small',
    ];

    public function getCMSFields()
    {
        $return = parent::getCMSFields();
        $return->removeByName('ShowTitle');
        $return->removeByName('ShowBorder');
        $return->removeByName('ScrollDownButtonTitle');
        $return->addFieldsToTab('Root.Main', [
            new TextField('Latitude', $this->fieldLabel('Latitude')),
            new TextField('Longitude', $this->fieldLabel('Longitude')),
            new DropdownField('Size', $this->fieldLabel('Size'), [
                'small'  => _t('SectionMap.SizeSmall', 'small'),
                'medium' => _t('SectionMap.SizeMedium', 'medium'),
                'large'  => _t('SectionMap.SizeLarge', 'large'),
                'full'   => _t('SectionMap.SizeFull', 'full'),
            ]),
        ], 'Content');
        return $return;
    }
}
