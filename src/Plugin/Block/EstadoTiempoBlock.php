<?php

namespace Drupal\estado_clima\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Weather state' Block.
 *
 * @Block(
 *   id = "estado_tiempo",
 *   admin_label = @Translation("Icono de Estado del tiempo"),
 *   category = @Translation("atenea_custom"),
 * )
 */
class EstadoTiempoBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $estadoClimaInfo  = \Drupal::service('estado_clima.EstadoClimaInfo');
    return array(
      '#markup' => $this->t('Estado del tiempo en españa!' . $estadoClimaInfo),
    );
  }

}
