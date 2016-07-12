<?php
/**
 * Exif plugin for Craft CMS
 *
 * Exif FieldType
 *
 * @author    Vadim Goncharov
 * @copyright Copyright (c) 2016 Vadim Goncharov
 * @link      http://roundhouseagency.com
 * @package   Exif
 * @since     0.0.1
 */

namespace Craft;

class ExifFieldType extends BaseFieldType
{
  public function getName()
  {
    return Craft::t('Exif');
  }

  public function defineContentAttribute()
  {
    return array(AttributeType::Mixed, 'column' => ColumnType::Text);
  }

  public function getInputHtml($name, $value)
  {
    if (!$value)
      $value = new ExifModel();

    $id = craft()->templates->formatInputId($name);
    $namespacedId = craft()->templates->namespaceInputId($id);

    craft()->templates->includeCssResource('exif/css/fields/ExifFieldType.css');

    $variables = array(
      'id' => $id,
      'name' => $name,
      'namespaceId' => $namespacedId,
      'values' => $value
    );

    return craft()->templates->render('exif/fields/ExifFieldType.twig', $variables);
  }

  public function onAfterSave()
  {
    $handle = $this->model->handle;
    $myPlugin = craft()->plugins->getPlugin('exif');

    $settings = [
      'exifField' => $handle
    ];

    craft()->plugins->savePluginSettings($myPlugin, $settings);
  }

}