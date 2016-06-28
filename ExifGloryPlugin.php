<?php
/**
 * Exif Glory plugin for Craft CMS
 *
 * Plugin to store exif data with every saved asset
 *
 * @author    Vadim Goncharov
 * @copyright Copyright (c) 2016 Vadim Goncharov
 * @link      http://photocollections.io
 * @package   ExifGlory
 * @since     0.0.1
 */

namespace Craft;

class ExifGloryPlugin extends BasePlugin
{
  /**
   * @return mixed
   */
  public function init()
  {
    parent::init();

    craft()->on('elements.onBeforeSaveElement', function(Event $event) {
      $element = $event->params['element'];
      $exifData = craft()->images->getExifData($element['url']);
      $element->getContent()->setAttribute('exifData', $exifData);
      // print_r($element);

    });

    // craft()->on('assets.onSaveAsset', function(Event $event) {
    // craft()->on('assets.onBeforeUploadAsset', function(Event $event) { #### TRY TO USE THIS to prevent requests
    craft()->on('assets.onBeforeSaveAsset', function(Event $event) {
      $asset = $event->params['asset'];
      $exifData = craft()->images->getExifData($asset['url']);
      $asset->getContent()->setAttribute('exifData', $exifData);
      // var_dump($exifData);

      // var_dump($asset);
      // $exifData = exif_read_data($asset['url'], NULL, true, true);
      // $content = $asset->getContent();
      // $content['exifData'] = $exifData;
      // $asset->setContentFromPost($content);
      // var_dump($asset);
      // craft()->elements->saveElement($asset);

      // var_dump($asset->getContent());
      // var_dump($asset['url']);
      // $exifData = exif_read_data($params['path'], NULL, true, true);
      // array_push($params, $exifData);
      // var_dump($event->params->getAttributes);
    });
  }

  /**
   * @return mixed
   */
  public function getName()
  {
    return Craft::t('Exif Glory');
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
    return 'https://github.com/owldesign/exifglory/blob/master/README.md';
  }

  /**
   * @return string
   */
  public function getReleaseFeedUrl()
  {
    return 'https://raw.githubusercontent.com/owldesign/exifglory/master/releases.json';
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
    return 'http://photocollections.io';
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
   return craft()->templates->render('exifglory/ExifGlory_Settings', array(
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

}