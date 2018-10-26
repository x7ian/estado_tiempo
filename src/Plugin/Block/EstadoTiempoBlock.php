<?php

namespace Drupal\estado_tiempo\Plugin\Block;

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
    /*return array(
      '#markup' => $this->t('Hello, World!'),
    );*/
    return [
      '#theme' => 'estado_tiempo_icono',
      '#fecha' => '2018-10-25',
      '#attached' => [
        'library' => [
          'estado_tiempo/estilos_icono',
        ],
      ],
    ];
  }

  /**
   * Prevent block from being cached.
   *
   */
  public function getCacheMaxAge() {
    return 0;
  }

}
