<?php
    $a = 0;    
    
    echo "Message 1 de ".basename(__FILE__).'<br>';
    echo "Valeur de \$a avant le rendu : $a".'<br>';
    
    require "ob_start_include.php";
    
    echo "Message 2 de ".basename(__FILE__).'<br>';
    echo "Valeur de \$a après le rendu : $a".'<br>';
    
