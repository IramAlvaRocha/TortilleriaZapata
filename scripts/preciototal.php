<?php
if(isset($_SESSION['compras']))
             {
                if(isset($_GET['prod']))
                {

                    $preciototalxd =  $_SESSION['sumaprecio'] ;;
                    echo "<h4>Total $: <label for='formGroupExampleInput' class='form-label'>$preciototalxd</label></h4>";
                    //$_SESSION['pre_tot'] = $preciototalxd;
                   // echo "<br>" . "Pre_tot final: " . $_SESSION['pre_tot'];
                    
                }
                
                if(!isset($_GET['prod']))
                {
                    $preciototal2 =  $_SESSION['sumaprecio'] ;
                    echo "<h4>Total $: <label for='formGroupExampleInput' class='form-label'>$preciototal2</label></h4>";
                    
                }
             }
             else echo "<h4><label for='formGroupExampleInput' class='form-label'>No hay productos en el carrito de compras :(</label></h4>";
?>             