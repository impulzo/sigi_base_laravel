<?php
namespace App\Mpdf;

class InvoiceReport extends \Mpdf\Mpdf
{
    var $title, $description, $reportTitle, $dates;
    function __construct(array $config = [])
    {
        //Call parent constructor
        parent::__construct($config);
    }
    // Cabecera de página
    function Header($content = '')
    {
        // Images
        //Linea Left
        $this->SetLineWidth(5);
        $this->SetDrawColor(172, 182, 186); //1, 35, 80
        $this->Line(10,10,10,285);
        //logo ($file, $x, $y, $w = 0, $h = 0)
        $this->Image('letterhead/logo.png',15,4,40,40);

        $this->SetTextColor(122, 122, 122);
        $this->SetFont('DejaVuSansMono','B',20); //DejaVuSansMono, FreeMono, XBRiyaz, Aegean, Aegyptus
        $txt = iconv('utf-8', 'cp1252', $this->reportTitle);
        $this->WriteText(75,15,utf8_encode($txt));
        $this->SetFont('DejaVuSansMono','',12); //DejaVuSansMono, FreeMono, XBRiyaz, Aegean, Aegyptus
        $txt = iconv('utf-8', 'cp1252', $this->description);
        $this->SetY(22);
        $this->SetX(75);
        $this->Cell(100,8,'FECHAS: '.$this->dates,0,1,'L');
        $this->SetX(75);
        $this->Cell(60,8,utf8_encode($txt),0,0,'L');
        // $this->SetY(63); //de donde va a comenzar el contenido
        $this->SetY(42);
    }

    // Pie de página
    function Footer()
    {
        $this->SetLineWidth(12);
        $this->SetDrawColor(172, 182, 186);
        $this->Line(0,292,210,292);
        // Arial italic 8
        $this->SetFont('Arial','',10);
        // Posición: a 1,5 cm del final
        $this->SetY(-12);
        $this->SetTextColor(0,0,0);
        // Número de página                                   C= Center, L= Left, R = Right
        $this->Cell(0,11,'Página '.$this->PageNo().'/{nb}',0,0,'C');
        
    }
}

?>