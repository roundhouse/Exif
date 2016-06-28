<?php
/**
 * Exif Glory plugin for Craft CMS
 *
 * ExifGlory Model
 *
 * @author    Vadim Goncharov
 * @copyright Copyright (c) 2016 Vadim Goncharov
 * @link      http://photocollections.io
 * @package   ExifGlory
 * @since     0.0.1
 */

namespace Craft;

class ExifGloryModel extends BaseModel
{
  /**
   * @return array
   */
  protected function defineAttributes()
  {
    return array_merge(parent::defineAttributes(), array(
      'exifData' => array(AttributeType::Mixed),
    ));
  }
}