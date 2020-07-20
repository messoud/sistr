<?php
    if(session_status()===PHP_SESSION_ACTIVE){
        session_abort();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sessions PHP</title>
    </head>
    <body>
        <h1>Sessions PHP</h1>
        <a href="sans-script-a.php">Sans session</a>
        <a href="avec-script-a.php">Avec session</a>
    </body>
</html>
