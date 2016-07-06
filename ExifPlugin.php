<?php
/**
 * Exif plugin for Craft CMS
 *
 * Plugin to store exif data with every saved asset
 *
 * @author    Vadim Goncharov
 * @copyright Copyright (c) 2016 Vadim Goncharov
 * @link      http://roundhouseagency.com
 * @package   Exif
 * @since     0.0.1
 */

namespace Craft;

class ExifPlugin extends BasePlugin
{
  /**
   * @return mixed
   */
  public function init()
  {
    parent::init();

    craft()->on('elements.onBeforeSaveElement', function(Event $event) {
      $element = $event->params['element'];
      $isNewElement = $event->params['isNewElement'];
      $elementType = $element['elementType'];

      if ($elementType == 'Asset') {
        if (!$element['exifData']) {
          $exifData = craft()->images->getExifData($element->getUrl());
          $exifData['cameraMake'] = $exifData['ifd0.Make'];
          $exifData['cameraModel'] = $exifData['ifd0.Model'];
          $exifData['iso'] = $exifData['exif.ISOSpeedRatings'];
          $exifData['focalLength'] = $exifData['exif.FocalLength'];
          $exifData['aperture'] = $exifData['exif.FNumber'];
          $exifData['shutterSpeed'] = $exifData['exif.ExposureTime'];
          $exifData['dateTaken'] = $exifData['exif.DateTimeOriginal'];
          $element->getContent()->setAttribute('exifData', $exifData);
        }
      }
    });

  }

  /**
   * @return mixed
   */
  public function getName()
  {
    return Craft::t('Exif');
  }

  /**
   * @return mixed
   */
  public function getDescription()
  {
    return Craft::t('Plugin to store exif data with every saved asset');
  }

  /**
   * @return string
   */
  public function getDocumentationUrl()
  {
    return 'https://github.com/roundhouse/Exif/blob/master/README.md';
  }

  /**
   * @return string
   */
  public function getReleaseFeedUrl()
  {
    return 'https://raw.githubusercontent.com/roundhouse/Exif/master/releases.json';
  }

  /**
   * @return string
   */
  public function getVersion()
  {
    return '0.0.1';
  }

  /**
   * @return string
   */
  public function getSchemaVersion()
  {
    return '0.0.1';
  }

  /**
   * @return string
   */
  public function getDeveloper()
  {
    return 'Vadim Goncharov';
  }

  /**
   * @return string
   */
  public function getDeveloperUrl()
  {
    return 'http://roundhouseagency.com';
  }

  /**
   * @return bool
   */
  public function hasCpSection()
  {
    return false;
  }

  /**
   */
  public function onBeforeInstall()
  {
  }

  /**
   */
  public function onAfterInstall()
  {
  }

  /**
   */
  public function onBeforeUninstall()
  {
  }

  /**
   */
  public function onAfterUninstall()
  {
  }

  /**
   * @return array
   */
  protected function defineSettings()
  {
    return array(
      'someSetting' => array(AttributeType::String, 'label' => 'Some Setting', 'default' => ''),
    );
  }

  /**
   * @return mixed
   */
  public function getSettingsHtml()
  {
   return craft()->templates->render('exif/ExifSettings', array(
     'settings' => $this->getSettings()
   ));
  }

  /**
   * @param mixed $settings  The Widget's settings
   *
   * @return mixed
   */
  public function prepSettings($settings)
  {
    // Modify $settings here...

    return $settings;
  }


  public function addTwigExtension()
  {
    Craft::import('plugins.exif.twigextensions.ExifTwigExtension');
    return new ExifTwigExtension();
  }

}