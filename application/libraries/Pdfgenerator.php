<?php
defined('BASEPATH') OR exit('No direct script access allowed');

define('DOMPDF_ENABLE_AUTOLOAD', false);
require_once("./vendor/dompdf/dompdf/dompdf_config.inc.php");

class Pdfgenerator {

  public function generate($html, $filename='', $stream=TRUE, $paper = 'A4', $orientation = "portrait")
  {
    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->set_paper($paper, $orientation);
    $dompdf->render();
    if ($stream) {
        $dompdf->stream($filename.".pdf", array("Attachment" => 0));
    } else {
        return $dompdf->output();
    }
  }
  public function generate_pdf($booking_id, $html, $filename='', $stream=FALSE, $paper = 'A4', $orientation = "portrait")
  {

    $filename = (!empty($filename)?$filename:date("Y-m-d")."-".$booking_id.'.pdf');

    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->set_paper($paper, $orientation);
    $dompdf->render();
    if ($stream) {
        $dompdf->stream($filename, array("Attachment" => 0));
    } else {
        $output = $dompdf->output();
        file_put_contents('assets/pdf/'.$filename, $output);
        $file_path = 'assets/pdf/'.$filename;
        return $file_path;
    }
  }


}
