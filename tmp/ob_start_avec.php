<?php
    $a = 0;    
    
    ob_start();
    require 'ob_start_include.php';
    $html = ob_get_clean();
    
    echo "Message 1 de ".basename(__FILE__).'<br>';
    echo "Valeur de \$a avant le rendu : $a".'<br>';
    
    echo $html;
    
    echo "Message 2 de ".basename(__FILE__).'<br>';
    echo "Valeur de \$a après le rendu : $a".'<br>';