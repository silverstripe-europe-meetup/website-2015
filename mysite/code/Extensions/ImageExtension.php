<?php

/**
 * Created by IntelliJ IDEA.
 * User: Sphere
 * Date: 7-10-2015
 * Time: 15:23
 */

/**
 * @property Image owner
 * StartGeneratedWithDataObjectAnnotator
 * @property int SortOrder
 * @property int GalleryID
 * @method Gallery Gallery
 * EndGeneratedWithDataObjectAnnotator
 */
class ImageExtension extends DataExtension
{

	private static $db = array(
		'SortOrder' => 'Int',
	);

	private static $has_one = array(
		'Gallery' => 'Gallery'
	);

	private static $default_sort = 'SortOrder ASC';

	public function largeCMSThumbnail() {
		return $this->owner->Pad(150,150);
	}
}
