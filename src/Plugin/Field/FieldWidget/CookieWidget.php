<?php

namespace Drupal\simple_cookies\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\Plugin\Field\FieldWidget\StringTextareaWidget;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\text\Plugin\Field\FieldWidget\TextfieldWidget;
use Symfony\Component\Validator\ConstraintViolationInterface;

/**
 * Plugin implementation of the 'text_textarea' widget.
 *
 * @FieldWidget(
 *   id = "default_cookie_widget",
 *   label = @Translation("Cookie"),
 *   field_types = {
 *     "cookie"
 *   }
 * )
 */
class CookieWidget extends TextfieldWidget {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $main_widget = parent::formElement($items, $delta, $element, $form, $form_state);

    $element['name'] = [
      '#type' => 'textfield',
      '#base_type' => $main_widget['name']['#type'],
      '#description' => $this->t('Name of Cookie'),
      '#default_value' => $items[$delta]->name,
    ];

    $element['value'] = [
      '#type' => 'textfield',
      '#description' => $this->t('Value of Cookie'),
      '#default_value' => $items[$delta]->value,
    ];

    $element['expiration'] = [
      '#type' => 'textfield',
      '#description' => $this->t('Expiration of Cookie (I.E - +1 year, +1 day + 3 months)'),
      '#default_value' => $items[$delta]->expiration,

    ];
    $element['path'] = [
      '#type' => 'textfield',
      '#description' => $this->t('Path of Cookie'),
      '#default_value' => $items[$delta]->path,

    ];
    $element['domain'] = [
      '#type' => 'textfield',
      '#description' => $this->t('Domain of Cookie'),
      '#default_value' => $items[$delta]->domain,
    ];
    $element['secure'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Secure Cookie'),
      '#default_value' => $items[$delta]->secure,
    ];
    $element['http_only'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('HTTP Only'),
      '#default_value' => $items[$delta]->http_only,
    ];
    return $element;
  }

}
