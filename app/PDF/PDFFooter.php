<?php
namespace App\PDF;

use setasign\Fpdi\Tcpdf\Fpdi;

class PDFFooter extends Fpdi {

    private $data = [];
    public function __construct($orientation = 'P', $unit = 'mm', $format = 'A4', $unicode = true, $encoding = 'UTF-8', $diskcache = false, $pdfa = false, $data = null)
    {
        $this->data = $data;
        parent::__construct($orientation, $unit, $format, $unicode, $encoding, $diskcache, $pdfa);
    }

    public function Footer() {
        // Position at 15 mm from bottom
        if ($this->page == 1) {
            $this->SetY(-19);
//        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
//        $this->Image(storage_path('app/'. $this->data['qr']), 3, '', 13, 13, 'PNG', $this->data['link'], '', false, 300, '', false,false,0,false,false,false);
            $this->Image(storage_path('app/' . $this->data['qr']), 3, '', 17, 17, 'PNG', $this->data['link'], '', false, 300, '', false, false, 0, false, false, false);
        }
    }
}
?>
