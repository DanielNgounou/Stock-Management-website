<?php
// require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;
ob_start();
require_once 'pdf.php';
$html=ob_get_contents(); // permet d'avoir le contenu du fichier la

ob_end_clean();
require_once 'dompdf/vendor/autoload.php';


  $dompdf = new Dompdf();
  
$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->setPaper('A4','Portrait');
$fichier ='Fournisseur.pdf';

$dompdf->stream($fichier); // permet d'afficher le contenu du document 

?>