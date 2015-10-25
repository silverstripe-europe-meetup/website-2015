<?php

/**
 * Created by IntelliJ IDEA.
 * User: Sphere
 * Date: 7-10-2015
 * Time: 15:27
 */

/**
 * StartGeneratedWithDataObjectAnnotator
 * @property string Title
 * @property int SortOrder
 * @property int CoverImageID
 * @property int SectionGalleryID
 * @method Image CoverImage
 * @method SectionGallery SectionGallery
 * @method DataList|Image[] Images
 * @method DataList|YTVideo[] YTVideos
 * EndGeneratedWithDataObjectAnnotator
 */
class Gallery extends DataObject
{
    private static $db = array(
        'Title'     => 'Varchar(255)',
        'SortOrder' => 'Int'
    );

    private static $has_one = array(
        'CoverImage'     => 'Image',
        'SectionGallery' => 'SectionGallery',
    );

    private static $has_many = array(
        'Images'   => 'Image',
        'YTVideos' => 'YTVideo',
    );

    private static $default_sort = 'SortOrder ASC';

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName(array('SortOrder'));
        /** @var GridFieldConfig_RecordEditor $gridFieldConfig */
        $gridFieldConfig = GridFieldConfig_RecordEditor::create();
        $gridFieldConfig->addComponent($uploader = new GridFieldBulkUpload());
        $gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));
        $gridFieldConfig->addComponent(new GridFieldGalleryTheme('largeCMSThumbnail'));
        $gridFieldConfig->removeComponentsByType('GridFieldPaginator');
        $gridFieldConfig->removeComponentsByType('GridFieldPageCount');
        $field = GridField::create(
            'Images', 'Images', $this->Images()->sort('SortOrder'), $gridFieldConfig);
        $fields->addFieldToTab('Root.Images', $field);
        /** @var UploadField $uploadField */
        $uploadField = $fields->dataFieldByName('CoverImage');
        $uploadField->setFolderName('coverimage/');

        $gridFieldConfig = GridFieldConfig_RecordEditor::create();
        $gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));
        $gridFieldConfig->removeComponentsByType('GridFieldPaginator');
        $gridFieldConfig->removeComponentsByType('GridFieldPageCount');
        $field = GridField::create(
            'YTVideos', 'Youtube Videos', $this->YTVideos()->sort('SortOrder'), $gridFieldConfig);
        $fields->addFieldToTab('Root.Youtubevideos', $field);
        return $fields;
    }

    public function canView($member = null)
    {
        return true;
    }

    public function canEdit($member = null)
    {
        return true;
    }

    public function canCreate($member = null)
    {
        return true;
    }


}
