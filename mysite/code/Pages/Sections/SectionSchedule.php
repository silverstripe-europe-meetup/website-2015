<?php

/**
 * Created by IntelliJ IDEA.
 * User: Sphere
 * Date: 14-9-2015
 * Time: 19:50
 */

/**
 * StartGeneratedWithDataObjectAnnotator
 * @property string BackgroundColor
 * EndGeneratedWithDataObjectAnnotator
 */
class SectionSchedule extends SectionBase
{

    private static $db = [
        'BackgroundColor' => 'Varchar',
    ];
    private static $defaults = [
        'BackgroundColor' => 'grey-light',
    ];

    public function getCMSFields()
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

    public function talks($day)
    {
        $talks = Talk::get()->filter(array('Day' => $day))->sort('Start ASC');
        if ($day === 'Sat') {
            $talks = GroupedList::create($talks->sort('Start ASC, Room ASC'));
        }
        return $talks;
    }

    public function isActive($day)
    {
        return ($day === 'Fri') ? 'active' : false;
    }

}
