<?php
include('../config/conexion_bot.php');
$conexion=conectar();
// getting user message through ajax
$getMesg = mysqli_real_escape_string($conexion, $_POST['text']);
//checking user query to database query
$check_data = "SELECT Respuesta FROM chatbot WHERE Pregunta LIKE '%$getMesg%'";
$run_query = mysqli_query($conexion, $check_data) or die("Error");
// if user query matched to database query we'll show the reply otherwise it go to else statement
if(mysqli_num_rows($run_query) > 0){
    //fetching replay from the database according to the user query
    $fetch_data = mysqli_fetch_assoc($run_query);
    //storing replay to a varible which we'll send to ajax
    $replay = $fetch_data['Respuesta'];
    echo $replay;
}else{
    echo "Disculpa, no logro comprender tu pregunta:(";
}
?>