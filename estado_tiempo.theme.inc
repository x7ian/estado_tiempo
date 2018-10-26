<?php
/**
 * @file
 * Theme for estado tiempo.
 */

 function template_preprocess_estado_tiempo_icono(&$variables) {
   $fecha = isset($variables['fecha'])? $variables['fecha'] : '';
   // Ajustar la zona horaria.
   $tz = 'Europe/Madrid';
   $timestamp = time();
   $dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
   $dt->setTimestamp($timestamp); //adjust the object to correct timestamp
   $variables['fecha'] = $fecha = $dt->format('Y-m-d');
   $variables['hora'] = $hora = $dt->format('H');
   $estadoClimaInfObj  = \Drupal::service('estado_tiempo.EstadoClimaInfo');
   $icono = $estadoClimaInfObj->getIconoClima($fecha, $hora);
   $variables['icono'] = drupal_render($icono);
   $variables['titulo'] = 'Tiempo en Madrid';
   // Mi Testing manual.
   /*$fr = $estadoClimaInfObj->getIconFilenameFragment('2018-10-26', '1');ksm($fr); // 45
   $fr = $estadoClimaInfObj->getIconFilenameFragment('2018-10-26', '14');ksm($fr); // 45
   $fr = $estadoClimaInfObj->getIconFilenameFragment('2018-10-26', '19');ksm($fr); // 15
   $fr = $estadoClimaInfObj->getIconFilenameFragment('2018-10-27', '3');ksm($fr); // 26n
   $fr = $estadoClimaInfObj->getIconFilenameFragment('2018-10-27', '8');ksm($fr); // 53
   $fr = $estadoClimaInfObj->getIconFilenameFragment('2018-10-27', '15');ksm($fr); // 63
   $fr = $estadoClimaInfObj->getIconFilenameFragment('2018-10-27', '20');ksm($fr); // 44
   $fr = $estadoClimaInfObj->getIconFilenameFragment('2018-10-28', '8');ksm($fr); // 45
   $fr = $estadoClimaInfObj->getIconFilenameFragment('2018-10-28', '16');ksm($fr); // 15
   $fr = $estadoClimaInfObj->getIconFilenameFragment('2018-10-29', '23');ksm($fr); // 15
   $fr = $estadoClimaInfObj->getIconFilenameFragment('2018-10-30', '5');ksm($fr); // 53
   */
 }
