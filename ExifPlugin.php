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

  public function init()
  {
    parent::init();

    craft()->on('elements.onBeforeSaveElement', function(Event $event) {
      $element = $event->params['element'];
      $isNewElement = $event->params['isNewElement'];
      $elementType = $element['elementType'];

      $settings = craft()->plugins->getPlugin('exif')->getSettings();

      if ($elementType == 'Asset') {
        if ($element->getExtension() == 'jpg' || $element->getExtension() == 'tiff' ) {
          if (!$element[$settings->exifField]) {
            $exifData = craft()->images->getExifData($element->getUrl());
            // IFD0
            $exifData['cameraMake'] = $exifData['ifd0.Make'];
            $exifData['cameraModel'] = $exifData['ifd0.Model'];
            $exifData['editSoftware'] = $exifData['ifd0.Software'];
            $exifData['editDate'] = $exifData['ifd0.DateTime'];

            // EXIF
            $exifData['shutterSpeed'] = $exifData['exif.ExposureTime'];
            $exifData['aperture'] = $exifData['exif.FNumber'];
            $exifData['iso'] = $exifData['exif.ISOSpeedRatings'];
            $exifData['focalLength'] = $exifData['exif.FocalLength'];
            $exifData['dateTaken'] = $exifData['exif.DateTimeOriginal'];
            $exifData['meteringMode'] = $exifData['exif.MeteringMode'];
            $exifData['lightSource'] = $exifData['exif.LightSource'];
            $exifData['flash'] = $exifData['exif.Flash'];
            $exifData['exposureMode'] = $exifData['exif.ExposureMode'];
            $exifData['whiteBalance'] = $exifData['exif.WhiteBalance'];
            $exifData['digitalZoomRatio'] = $exifData['exif.DigitalZoomRatio'];
            $exifData['sceneCaptureType'] = $exifData['exif.SceneCaptureType'];
            $exifData['contrast'] = $exifData['exif.Contrast'];
            $exifData['saturation'] = $exifData['exif.Saturation'];
            $exifData['sharpness'] = $exifData['exif.Sharpness'];
            $exifData['subjectDistanceRange'] = $exifData['exif.SubjectDistanceRange'];
            $element->getContent()->setAttribute($settings->exifField, $exifData);
          }
        }
      }
    });

  }

  public function getName()
  {
    return Craft::t('Exif');
  }

  public function getDescription()
  {
    return Craft::t('Plugin to store exif data with every saved asset');
  }

  public function getDocumentationUrl()
  {
    return 'https://github.com/roundhouse/Exif/blob/master/README.md';
  }

  public function getReleaseFeedUrl()
  {
    return 'https://raw.githubusercontent.com/roundhouse/Exif/master/releases.json';
  }

  public function getVersion()
  {
    return '1.0.2';
  }

  public function getSchemaVersion()
  {
    return '1.0.1';
  }

  public function getDeveloper()
  {
    return 'Vadim Goncharov';
  }

  public function getDeveloperUrl()
  {
    return 'http://roundhouseagency.com';
  }

  public function hasCpSection()
  {
    return false;
  }

  protected function defineSettings()
  {
    return array(
      'exifField' => AttributeType::String
    );
  }

  // public function addTwigExtension()
  // {
  //   Craft::import('plugins.exif.twigextensions.ExifTwigExtension');
  //   return new ExifTwigExtension();
  // }

}