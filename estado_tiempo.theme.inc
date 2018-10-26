<?php
/**
 * @file
 * Theme for estado tiempo.
 */

function template_preprocess_estado_tiempo_icono(&$variables) {
//  $estadoClimaInfo  = \Drupal::service('estado_tiempo.EstadoClimaInfo');
  $path_to_image = 'a ver'; /*base_path()
    . \Drupal::moduleHandler()->getModule('moduleName')->getPath()
    . '/images/';*/
  $variables['icono'] = "wtf";
  //var_dump($estadoClimaInfo);die();
}
