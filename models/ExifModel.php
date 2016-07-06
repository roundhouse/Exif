<?php
/**
 * Exif plugin for Craft CMS
 *
 * Exif Model
 *
 * @author    Vadim Goncharov
 * @copyright Copyright (c) 2016 Vadim Goncharov
 * @link      http://roundhouseagency.com
 * @package   Exif
 * @since     0.0.1
 */

namespace Craft;

class ExifModel extends BaseModel
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