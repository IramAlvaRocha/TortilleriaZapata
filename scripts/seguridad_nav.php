<?php

session_start();


if(empty($_SESSION['user']) || empty($_SESSION['password'])){
    $sesion_iniciada=0;
}else{
    $sesion_iniciada=1;
}


 ?>