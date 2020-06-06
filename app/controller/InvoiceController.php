<?php
require_once(__ROOT__ . "controller/Controller.php");
   class InvoiceController extends Controller{

   public function printReceipt()
    {
        if(!isset($_SESSION)){
            session_start();
        }
        $id = $_SESSION['ID'];
        $fname = $_SESSION['FirstName'];
        $lname = $_SESSION['LastName'];
        $phone = $_SESSION['Phone'];

        //$courses = $this->model->getCourses()[$cid];
        //$section = $this->model->getSections()[$sid];

       // $sectionname = $section->getSectionname();
        //$sectiontime = $section->getSectiontime();
        //$sectioncost = $section->getSectioncost();
        //$sectionlink = $section->getSectionlink();

        //$coursename= $courses->getCourseName();
        //$coursetype= $courses->getCourseType();
        //$coursedes= $courses->getCourseDescription();
        //$courseweeks= $courses->getCourseWeeks();
        //$coursehours= $courses->getCourseHours();
        //$startdate = $courses->Start();
        //$enddate = $courses->End();
        require_once '../app/model/FPDF/fpdf.php';
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Image('../public/images/logo.jpg', 165, 10, 20);
        $Y = $pdf->GetY();
        $x = $pdf->GetX();
        $pdf->SetXY($x + 145, $Y + 10);
        //$pdf->Cell(40, 20, $gym->getGymName(), '', '', 'C');
        $pdf->SetXY($x, $Y + 20);
        $pdf->Cell(80);
        $pdf->SetTitle("Section Receipt");
       
        $pdf->Ln();
        $pdf->Cell(190, 7, 'Student Details', 1, 2, 'C');
        $Y = $pdf->GetY();
        $pdf->MultiCell(95, 8, " Student ID : " . $id. "\n First Name : " . $fname, "LRB", "1");
        $x = $pdf->GetX();
        $pdf->SetXY($x + 95, $Y);
        $pdf->MultiCell(95, 8, ' Mobile Phone : ' . $phone. "\n Last Name : " . $lname, "LRB", "1");
        $pdf->Ln();
        $pdf->SetFillColor(235, 235, 235);
        $pdf->Cell(189, 7, 'Payment Details', 1, 2, 'C');

        $pdf->Cell(27, 10, 'Fees', 1, 0, 'C', 1);
        $pdf->Cell(27, 10, 'Discount', 1, 0, 'C', 1);
        $pdf->Cell(27, 10, 'Total Cost', 1, 0, 'C', 1);
       
        $Y = $pdf->GetY();
        $pdf->SetXY($x, $Y + 10);
        //$pdf->Cell(27, 10, $sectioncost, 1, 0, 'C', 0);
        //$pdf->Cell(27, 10, $discount, 1, 0, 'C', 0);
        //$pdf->Cell(27, 10, $totalAmount, 1, 0, 'C', 0);
       
        $pdf->Ln();
        $Y = $pdf->GetY();
        $pdf->SetXY($x + 84, $Y + 10);
        $Y = $pdf->GetY();
        $pdf->SetFont('helvetica', 'UB', 10);
        $pdf->Cell(27, 10, "Added By", '', 0, 'C', 0);
        $pdf->SetXY($x + 84, $Y + 10);
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(27, 10, "Ostora", '', 0, 'C', 0);
        $pdf->Output();
    }
}
    ?>