<?php
//PDF USING MULTIPLE PAGES
//CREATED BY: Carlos Vasquez S.
//E-MAIL: cvasquez@cvs.cl
//CVS TECNOLOGIA E INNOVACION
//SANTIAGO, CHILE

require('masterpdf.php');

//Connect to your database
require_once('../attempt/connect.php');

//Create new pdf file
$pdf = new FPDF('L','mm',array(330,215));

//Disable automatic page break
$pdf->SetAutoPageBreak(true);

//Add first page
$pdf->AddPage();

$logoFile = "../images/greatt.png";
$logoXPos = 107;
$logoYPos = 7;
$logoWidth = 105;
$r=1;

// Logo

$pdf->Image( $logoFile, $logoXPos, $logoYPos, $logoWidth );

//set initial y axis position per page
$y_axis_initial = 55;

//print column titles
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','',16);
$pdf->SetY(10);

$pdf->SetY(10);
$pdf->SetX(25);

$pdf->SetY(40);
$pdf->SetY(35);
$pdf->Cell(310,10,'Cebu City, Philippines',0,0,'C',0);
$pdf->SetY(50);
$pdf->Cell(310,10,'Final Schedule',0,0,'C',0);
$pdf->SetFont('Arial','',12);
$pdf->SetY(30);

$pdf->SetY($y_axis_initial);

$pdf->SetY(61);
$pdf->SetX(10);
$pdf->Cell(77,6,'Class',1,0,'C',1);
$pdf->Cell(77,6,'Day Schedule',1,0,'C',1);
$pdf->Cell(77,6,'Time Schedule',1,0,'C',1);
//$pdf->Cell(40,6,'Instructor',1,0,'C',1);
$pdf->Cell(77,6,'Classroom',1,0,'C',1);
$y_axis = $y_axis_initial + 12;

//Select the Products you want to show in your PDF file
$id=$_GET['id'];

$enrolled= mysql_query("Select t1.class_level, t2.*, t3.* from class_category as t1 inner join class_enrolled as t2 on t2.class_id=t1.class_id 
													inner join class_schedule as t3 on t2.class_schedule_id=t3.class_schedule_id  where t2.student_id='".$id."'");

//initialize counter
$i = 0;

//Set maximum rows per page
$max = 30;

//Set Row Height
$row_height = 6;

while($row = mysql_fetch_array($enrolled))
{
    
    $max = 30;
    
    //If the current row is the last one, create new page and print column title
    if ($i == $max)
    {
        $pdf->AddPage();

        //print column titles for the current page
        $pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','',16);
$pdf->SetY(10);

$pdf->SetY(10);
$pdf->SetX(25);

$pdf->SetY(40);
$pdf->Cell(300,6,'Cebu Centre for Dance',0,0,'C',0);
$pdf->SetY(35);
$pdf->Cell(300,6,'Cebu CIty, Philippines',0,0,'C',0);
$pdf->SetY(50);
$pdf->Cell(300,6,'Master List ',0,0,'C',0);
$pdf->SetFont('Arial','',12);
$pdf->SetY(30);

$pdf->SetY($y_axis_initial);

$pdf->SetY(61);
$pdf->SetX(10);
$pdf->Cell(77,6,'Class',1,0,'C',1);
$pdf->Cell(77,6,'Day Schedule',1,0,'C',1);
$pdf->Cell(77,6,'Time Schedule',1,0,'C',1);
//$pdf->Cell(40,6,'Instructor',1,0,'C',1);
$pdf->Cell(77,6,'Classroom',1,0,'C',1);

$pdf->SetY($y_axis_initial);

$pdf->SetY(61);
$pdf->SetX(10);
$pdf->Cell(77,6,'Class',1,0,'C',1);
$pdf->Cell(77,6,'Day Schedule',1,0,'C',1);
$pdf->Cell(77,6,'Time Schedule',1,0,'C',1);
//$pdf->Cell(40,6,'Instructor',1,0,'C',1);
$pdf->Cell(77,6,'Classroom',1,0,'C',1);

$y_axis = $y_axis_initial + 12;
        //Go to next row
       // $y_axis = $y_axis + $row_height;
        
        //Set $i variable to 0 (first row)
        $i = 0;
    }
    $class = $row['class_level'];
    $ds = $row['day'];
    $ts= $row['time'];
    //$ins = $row['instructor_id'];
    $classroom = $row['classroom'];


    $pdf->SetY($y_axis);
    $pdf->SetX(10);
    $pdf->Cell(77,6,$class,1,0,'C',0);
    $pdf->Cell(77,6,$ds,1,0,'C',0);
    $pdf->Cell(77,6,$ts,1,0,'C',0);
    //$pdf->Cell(40,6,$ins,1,0,'L',0);
    $pdf->Cell(77,6,$classroom,1,0,'C',0);

       
    //Go to next row
    $y_axis = $y_axis + $row_height;
    $i = $i + 1;
}   



//Send file
$pdf->Output();
?>