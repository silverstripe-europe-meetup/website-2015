<?php

/**
 * Created by IntelliJ IDEA.
 * User: Sphere
 * Date: 21-10-2015
 * Time: 13:12
 */

/**
 * StartGeneratedWithDataObjectAnnotator
 * @property string Title
 * @property string Code
 * @property int    SortOrder
 * @property int    GalleriesID
 * @method Gallery Galleries
 * EndGeneratedWithDataObjectAnnotator
 */
class YTVideo extends DataObject
{
	private static $db = array(
		'Title'     => 'Varchar(255)',
		'Code'      => 'Varchar(255)',
		'SortOrder' => 'Int'
	);
	private static $has_one = array(
		'Galleries' => 'Gallery'
	);

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();
		$fields->removeByName(array('SortOrder'));

		return $fields;
	}

	public function onBeforeWrite()
	{
		parent::onBeforeWrite();
		if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $this->Code, $match)) {
			$this->Code = $match[1];
		}
	}

	public function squareImage()
	{
		Folder::find_or_make(Director::baseFolder() . '/assets/ytimages');
		if (!file_exists(Director::baseFolder() . '/assets/ytimages/' . $this->Code . '.png')) {
			//Your Image
			$imgSrc = "http://img.youtube.com/vi/{$this->Code}/hqdefault.jpg";

			//getting the image dimensions
			list($width, $height) = getimagesize($imgSrc);

			//saving the image into memory (for manipulation with GD Library)
			$myImage = imagecreatefromjpeg($imgSrc);

			// calculating the part of the image to use for thumbnail
			if ($width > $height) {
				$y = 0;
				$x = ($width - $height) / 2;
				$smallestSide = $height;
			} else {
				$x = 0;
				$y = ($height - $width) / 2;
				$smallestSide = $width;
			}

			// copying the part into thumbnail
			$thumbSize = 120;
			$thumb = imagecreatetruecolor($thumbSize, $thumbSize);
			$result = imagecopyresampled($thumb, $myImage, 0, 0, $x, $y, $thumbSize, $thumbSize, $smallestSide, $smallestSide);
			imagepng($thumb, Director::baseFolder() . '/assets/ytimages/' . $this->Code . '.png');
		}

		return '/assets/ytimages/' . $this->Code . '.png';

	}

}
