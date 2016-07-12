<?php
/**
 * Exif plugin for Craft CMS
 *
 * Exif Variable
 *
 * @author    Vadim Goncharov
 * @copyright Copyright (c) 2016 Vadim Goncharov
 * @link      http://roundhouseagency.com
 * @package   Exif
 * @since     0.0.1
 */

namespace Craft;

class ExifVariable
{
  public function checkArrayVariable($array)
  {
    return is_array($array);
  }
}