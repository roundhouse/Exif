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
      $value = new ExifModel();

    $id = craft()->templates->formatInputId($name);
    $namespacedId = craft()->templates->namespaceInputId($id);


    craft()->templates->includeCssResource('exif/css/fields/ExifFieldType.css');
    craft()->templates->includeJsResource('exif/js/fields/ExifFieldType.js');

    $jsonVars = array(
      'id' => $id,
      'name' => $name,
      'namespace' => $namespacedId,
      'prefix' => craft()->templates->namespaceInputId(""),
    );

    $jsonVars = json_encode($jsonVars);
    craft()->templates->includeJs("$('#{$namespacedId}').ExifFieldType(" . $jsonVars . ");");

    $variables = array(
      'id' => $id,
      'name' => $name,
      'namespaceId' => $namespacedId,
      'values' => $value,
      // 'fieldId'   => $this->model->id,
      // 'elementId' => $this->element->id,
    );

    return craft()->templates->render('exif/fields/ExifFieldType.twig', $variables);
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