<?php

require __DIR__ . '/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

// PDF
$pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', 0);

// One Page
$pdf->setTestTdInOnePage(false);

// Pdf Content
$content = json_decode(file_get_contents("php://input"),true);

// Template
ob_start();
include dirname(__FILE__) . '/pdf.php';
$res = ob_get_clean();

$pdf->writeHTML($res);

ob_clean();
// Output
$pdf->output('./sample.pdf');
//$pdf->output('./sample.pdf', 'D');
