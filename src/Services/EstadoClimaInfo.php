<?php

namespace Drupal\estado_tiempo\Services;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
/**
 * Class CustomMetatags.
 *
 * @package Drupal\losnahuales
 */
class EstadoClimaInfo {

  /**
    * The URL for the endpint.
    * Agencia Estatal de Meteorología - AEMET. Gobierno de España www.aemet.es
    *
    * @var string
    */
  private $endpoint = "http://www.aemet.es/xml/municipios/localidad_28079.xml";

  /**
   * Get the weather conditions icon image render array
   *
   * @var string
   *
   * @se
   */
  public function getIconoClima($fecha, $hora) {
    $fragment = $this->getIconFilenameFragment($fecha, $hora);
    $filename = $fragment . '_g.png';
    $path_to_image = base_path()
      . \Drupal::moduleHandler()->getModule('estado_tiempo')->getPath()
      . '/images/';
    return [
      '#theme' => 'image',
      '#uri' => $path_to_image . $filename,
    ];
  }

  /**
   * Get the weather conditions icon image filename fragment.
   *
   * @var string
   *
   * @se
   */
  public function getIconFilenameFragment($fecha, $hora) {
    $info = $this->getInfo();
    $dias = $info['prediccion']['dia'];
    foreach($dias as $dia) {
      if ($dia['@fecha']==$fecha) {
        break;
      }
    }
    $estado_cielo = $dia['estado_cielo'];
    foreach(array_reverse($estado_cielo) as $horas) {
      list($inic, $fin) = explode('-', $horas['@periodo']);
      if ($hora>=$inic && $hora<=$fin) {
        break;
      }
    }
    $filename_fragment = $horas['#'];
    return $filename_fragment;
  }

  /**
   * Get all the info at the feed xml converted in an array
   *
   * @var array
   *
   * @se
   */
  public function getInfo() {
    $feed_xml = file_get_contents($this->endpoint);

    $decoder = new XmlEncoder('root');
    $feed_array = $decoder->decode($feed_xml, 'xml');

    return $feed_array;
  }

}
