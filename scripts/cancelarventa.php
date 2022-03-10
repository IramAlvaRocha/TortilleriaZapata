<?php

    session_start();
    unset($_SESSION['compras']);
    unset($_SESSION['pre_tot']);
    echo '<script lenguage="javascript">window.location.replace("../puntodeventa.php");</script>';

?>