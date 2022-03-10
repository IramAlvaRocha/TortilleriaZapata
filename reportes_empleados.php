<?php
session_start();
ob_start();
require('fpdf/fpdf.php');
require('scripts/conexion.php');

$conexion = conectar();

if(!isset($_SESSION['empleado']))
{
    echo '<script language="javascript">alert("PRIMERO DEBE INICIAR SESIÓN");</script>';
    echo '<script lenguage="javascript">window.location.replace("login.php");</script>';
}
$sucursal= $_GET['sucursal'];
$zona= $_GET['zona'];
$consultazona= "SELECT * FROM sucursal WHERE zona_sucursal='$zona' AND nombre_sucursal='$sucursal'";
$consultadazona= mysqli_query($conexion, $consultazona);
$numfilas1 = mysqli_num_rows($consultadazona);
if($numfilas1<1)
{
    echo '<script language="javascript">alert("Zona o sucursal equivocada, favor de intentar nuevamente");</script>';
    echo '<script lenguage="javascript">window.location.replace("reportes.php");</script>';
}
$consulta = "SELECT folio_Empleado, nombre_Empleado, correo_Empleado, direccion_Empleado FROM empleado WHERE sucursal_empleado='$sucursal'";
$consultada = mysqli_query($conexion, $consulta);

$resultados = mysqli_fetch_array($consultada);
$numfilas = mysqli_num_rows($consultada);
$i=0;
if($numfilas<1)
{
    echo '<script language="javascript">alert("NO HAY DATOS PARA MOSTRAR");</script>';
    echo '<script lenguage="javascript">window.location.replace("reportes.php");</script>';
}
$consulta2 = "SELECT folio_EmpleadoFK FROM venta";
$consultada2 = mysqli_query($conexion, $consulta2);


while($row = $consultada2->fetch_array())
{
$rows[] = $row;
}

//$valores = array_count_values($rows);
//$idvalores = count($valores);
//$valorsote = max($valores); 

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',18);
    // Movernos a la derecha
    date_default_timezone_set("America/Monterrey");
    $fecha = date('Y-m-d   H:i:s');
    $sucursal= $_GET['sucursal'];
    $zona= $_GET['zona'];
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'Reporte de empleados Zapatapp',0,1,'C');
    // Salto de línea
    $this->Ln(20);
    $this->Cell(180,-25,$fecha,0,1,'C');
    $this->Ln(10);
    $this->Cell(180,25,"Sucursal " . $sucursal,0,1,'C');
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Tortilleria Zapata. All Rights Reserved 2021.' ,0,0,'C');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->SetY(50);
$pdf->Cell(20,10,'Folio', 1,0,'C');
$pdf->Cell(65,10,'Nombre empleado', 1,0,'C');
$pdf->Cell(55,10,'Correo', 1,0,'C');
$pdf->Cell(45,10,'Direccion', 1,0,'C');
for($i=0;$i<=$resultados;$i++)
{
    $pdf->Ln(20);
    $pdf->Cell(20,20, $resultados['folio_Empleado'], 1,0,'C');
    $pdf->Cell(65,20, $resultados['nombre_Empleado'], 1,0,'C');
    $pdf->Cell(55,20, $resultados['correo_Empleado'], 1,0,'C');
    $pdf->Cell(45,20, $resultados['direccion_Empleado'], 1,0,'C');

    $resultados = mysqli_fetch_array($consultada);
}
$pdf->Ln(30);
$pdf->SetFont('Times','',20);
$pdf->Cell(0,0, 'Total de empleados: ' . $numfilas, 0,0,'C');
$pdf->Ln(10);
/*
//$pdf->Cell(30,20, 'Empleado con mas ventas: ' . $valores['1889240'], 0,0,'J');
foreach($rows as $row)
{
    $pdf->Ln(10);
    $pdf->Cell(30,20, '',0,0,'J');
}
$pdf->Ln(10);
    $pdf->Cell(30,20, print_r($rows), 0,0,'J');
*/
$pdf->Output();
ob_end_flush();
?>