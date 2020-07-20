<?php
    $html = '<p>Avec du [%STYLE%] et du [%PANACHE%] on peut faire des trucs sympas [%NUL%][%FIN%]</p>';
           
    echo preg_replace_callback('/\[%\w+\%]/is', 'callback', $html);
       
    function callback($matches){            
        switch($matches[0]){
            case '[%STYLE%]': return '<i>fun</i>';
            case '[%PANACHE%]': return '<b>potentiel</b>';
            default:
                return '??';
        }
    }

