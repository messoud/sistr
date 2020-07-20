<?php
    $data = parse_ini_file('configuration.ini');
    
    if(!$data) {
        die('Fichier non lisible');
    }
?>
<pre><?php print_r($data);?></pre>    