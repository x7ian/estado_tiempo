<?php

namespace Drupal\estado_clima\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Hello' Block.
 *
 * @Block(
 *   id = "hello_block",
 *   admin_label = @Translation("Hello block"),
 *   category = @Translation("Hello World"),
 * )
 */
class EstadoClimaInfo extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function getInfo() {
    return "INFO ESTADO CLIMA";
  }

}
