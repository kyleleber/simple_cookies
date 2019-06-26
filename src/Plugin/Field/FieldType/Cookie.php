<?php

namespace Drupal\simple_cookies\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation of the 'field_example_rgb' field type.
 *
 * @FieldType(
 *   id = "cookie",
 *   label = @Translation("Cookies"),
 *   module = "simple_cookies",
 *   description = @Translation("Creates a field that sets a cookie"),
 *   default_widget = "default_cookie_widget",
 * )
 */
class Cookie extends FieldItemBase {

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return [
      'columns' => [
        'name' => [
          'type' => 'varchar',
          'length' => 255,
          'not null' => TRUE,
        ],
        'value' => [
          'type' => 'varchar',
          'length' => 255,
          'not null' => TRUE,
        ],
        'expiration' => [
          'type' => 'varchar',
          'length' => 255,
          'not null' => TRUE,
        ],
        'path' => [
          'type' => 'varchar',
          'length' => 255,
          'not null' => TRUE,
        ],
        'domain' => [
          'type' => 'varchar',
          'length' => 255,
          'not null' => TRUE,
        ],
        'secure' => [
          'type' => 'int',
          'not null' => TRUE,
        ],
        'http_only' => [
          'type' => 'int',
          'not null' => TRUE,
        ],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    $value = $this->get('name')->getValue();
    return $value === NULL || $value === '';
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['name'] = DataDefinition::create('string')
      ->setLabel(t('Cookie Name'));
    $properties['value'] = DataDefinition::create('string')
      ->setLabel(t('Cookie Value'));
    $properties['expiration'] = DataDefinition::create('string')
      ->setLabel(t('Cookie Expiration'));
    $properties['path'] = DataDefinition::create('string')
      ->setLabel(t('Cookie Path'));
    $properties['domain'] = DataDefinition::create('string')
      ->setLabel(t('Cookie Domain'));
    $properties['secure'] = DataDefinition::create('string')
      ->setLabel(t('Secure'));
    $properties['http_only'] = DataDefinition::create('string')
      ->setLabel(t('HTTP Only'));

    return $properties;
  }

}