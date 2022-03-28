<?php
session_start();
// connecting to database
require('../../../scripts/conexion.php');
					$conexion=conectar();                   
	$sql=$_SESSION['dev_sql'];
    $sql2=$_SESSION['dev_sql2'];
	$mes='';
	$ano1='';
	if($sql!=$sql2 && $sql2!=""){
		$mes=" en ";
		$mes1=$_SESSION['mes1'];
		$ano1=$ano1 . ' de ' . $_SESSION['ano1'];
		switch($mes1){
			case '01':$mes=$mes . 'Enero';break;
			case '02':$mes=$mes . 'Febrero';break;
			case '03':$mes=$mes . 'Marzo';break;
			case '04':$mes=$mes . 'Abril';break;
			case '05':$mes=$mes . 'Mayo';break;
			case '06':$mes=$mes . 'Junio';break;
			case '07':$mes=$mes . 'Julio';break;
			case '08':$mes=$mes . 'Agosto';break;
			case '09':$mes=$mes . 'Septiembre';break;
			case '10':$mes=$mes . 'Octubre';break;
			case '11':$mes=$mes . 'Noviembre';break;
			case '12':$mes=$mes . 'Diciembre';break;
		}
	}
?>
<script src="../Chart.js"></script>
	<h1 style="font-family:sans-serif; ">Grafica de devoluciones <?php echo $mes . $ano1;?> </h1>
		<div style="width: 100%;" >
			<canvas id="canvas" height="200" width="400"></canvas>
		</div>


	<script>
		var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

		var barChartData = {
			labels : [
					<?php 
						
						
						$consulta="SELECT * FROM sucursal;";
						$resultado=mysqli_query($conexion,$consulta);
						while($lista=mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
							?>
								'<?php echo $lista['nombre_sucursal'] ?>',
							<?php
						}	
					?>

			],
			datasets : [
				{
					fillColor : "rgba(54, 132, 107,0.9)",
					strokeColor : "rgba(220,220,220,0.8)",
					highlightFill: "rgba(23, 25, 39,0.75)",
					highlightStroke: "rgba(220,220,220,1)",
					data : [
						<?php 
						$consulta="SELECT * FROM sucursal;";
						$resultado=mysqli_query($conexion,$consulta);
						while($lista=mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
							$sucursal=$lista['nombre_sucursal'];
							//$consulta2="SELECT * FROM gasto where sucursal_gasto='$sucursal';";
							$resultado2=mysqli_query($conexion,$_SESSION['dev_sql']);
							$contador_venta=0;
							while($lista2=mysqli_fetch_array($resultado2,MYSQLI_ASSOC)){
								if($lista2['sucursal_Devolucion']==$sucursal){
									$contador_venta+=$lista2['perdida_Devolucion'];                               
								}
							}
							?>
								'<?php echo $contador_venta ?>',
							<?php
						}
						?>
					]
				}
			]

		}
		window.onload = function(){
				var ctx = document.getElementById("canvas").getContext("2d");
				window.myBar = new Chart(ctx).Bar(barChartData, {
					responsive : true
				});
			}
</script>
