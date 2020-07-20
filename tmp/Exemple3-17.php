<?php
$a=10;
$b=0;
try
{
    if($b==0) {
        
        
        throw new Exception("Division par 0",7);
    }
    else{
        
        
        echo "Résultat de : $a / $b = ",$a/$b;
    }
}
catch(Exception $except)
{
    echo "<script type=\"text/javascript\"> alert(' Erreur n˚".$except->getCode()." Ligne = ".$except->getLine()." ') </script> "; 
}
echo "FIN";
?>
