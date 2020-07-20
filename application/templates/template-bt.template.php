<?php
    namespace Sistr;
    defined('SISTR') or die('Acces interdit');
    
    \F3il\Messages::setMessageRenderer('\Sistr\MessagesHelper::messagesRenderer');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        [%TITLE%]
        <link href="vendors/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        [%STYLESHEETS%]
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="jumbotron"><h1>Template BT</h1><br><small><?php echo __FILE__;?></small></div>
            </div>
            <div class="row">
                <nav class="navbar navbar-default">
                    <p class="navbar-text">Navigation</p>
                </nav>
            </div>
            <div class="row">
                <div class="col-md-9">
                    [%MESSAGES%]
                    [%VIEW%]
                </div>
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            Aside
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="vendors/jquery-3.1.1/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="vendors/bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>