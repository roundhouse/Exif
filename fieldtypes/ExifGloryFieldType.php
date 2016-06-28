<?php
/**
 * Exif Glory plugin for Craft CMS
 *
 * ExifGlory FieldType
 *
 * @author    Vadim Goncharov
 * @copyright Copyright (c) 2016 Vadim Goncharov
 * @link      http://photocollections.io
 * @package   ExifGlory
 * @since     0.0.1
 */

namespace Craft;

class ExifGloryFieldType extends BaseFieldType
{
  /**
   * @return mixed
   */
  public function getName()
  {
    return Craft::t('ExifGlory');
  }

  /**
   * @return mixed
   */
  public function defineContentAttribute()
  {
    return array(AttributeType::Mixed, 'column' => ColumnType::Text);
  }

  /**
   * @param string $name
   * @param mixed  $value
   * @return string
   */
  public function getInputHtml($name, $value)
  {
    if (!$value)
      $value = new ExifGloryModel();

    $id = craft()->templates->formatInputId($name);
    $namespacedId = craft()->templates->namespaceInputId($id);


    craft()->templates->includeCssResource('exifglory/css/fields/ExifGloryFieldType.css');
    craft()->templates->includeJsResource('exifglory/js/fields/ExifGloryFieldType.js');

    $jsonVars = array(
      'id' => $id,
      'name' => $name,
      'namespace' => $namespacedId,
      'prefix' => craft()->templates->namespaceInputId(""),
    );

    $jsonVars = json_encode($jsonVars);
    craft()->templates->includeJs("$('#{$namespacedId}').ExifGloryFieldType(" . $jsonVars . ");");

    $variables = array(
      'id' => $id,
      'name' => $name,
      'namespaceId' => $namespacedId,
      'values' => $value,
      // 'fieldId'   => $this->model->id,
      // 'elementId' => $this->element->id,
    );

    return craft()->templates->render('exifglory/fields/ExifGloryFieldType.twig', $variables);
  }

  /**
   * @param mixed $value
   * @return mixed
   */
  public function prepValueFromPost($value)
  {
    return $value;
  }

  /**
   * @param mixed $value
   * @return mixed
   */
  public function prepValue($value)
  {
    return $value;
  }
}