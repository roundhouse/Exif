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
    return array(
      'exifField' => AttributeType::String
    );
  }
}