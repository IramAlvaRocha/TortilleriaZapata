<script src="../Chart.js"></script>
<h1 style="font-family:sans-serif; margin-left:250px;">Gastos por sucursal</h1>
		<div style="width: 80%">
			<canvas id="canvas" height="300" width="600"></canvas>
		</div>


	<script>
	var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

	var barChartData = {
		labels : [
				<?php 
					require('../../../scripts/conexion.php');
					$conexion=conectar();
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
				fillColor : "rgba(54, 132, 107 ,0.9)",
				strokeColor : "rgba(220,220,220,0.8)",
				highlightFill: "rgba(23, 25, 39,0.75)",
				highlightStroke: "rgba(220,220,220,1)",
				data : [
					<?php 
					$consulta="SELECT * FROM sucursal;";
					$resultado=mysqli_query($conexion,$consulta);
					while($lista=mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
						$sucursal=$lista['nombre_sucursal'];
						$consulta2="SELECT * FROM gasto where sucursal_gasto='$sucursal';";
						$resultado2=mysqli_query($conexion,$consulta2);
						$contador_venta=0;
						while($lista2=mysqli_fetch_array($resultado2,MYSQLI_ASSOC)){
							$contador_venta+=$lista2['monto_gasto'];
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

	</script></script>