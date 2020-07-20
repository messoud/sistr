<?php namespace Sistr;
    defined('SISTR') or die('Acces interdit');
?>
<!DOCTYPE>
<html>
    <head>
        <meta charset="UTF-8">        
        <style type="text/css">
            body * {
                margin:0px;
            }
            nav {
                background-color: black;
                color:white;
                text-align: right;
                min-height: 80px;
            }
            header {
                font-size:1.3em;
                background-color: #7A3466;
                color:white;
                min-height: 180px;
                text-align: right;
            }
            main {
                min-height: 400px;
                border-left:1px solid #CCCCCC;
                padding-left:40px;
                margin-left:40px;
            }
            footer {
                background-color: black;
                color:white;
                text-align: center;
                min-height: 80px;
            }
        </style>
         <title> <?php echo $this->__get('titre');?></title>
    </head>
    <body>
        <nav>Navigation</nav>
        <header>
            <h1>Template B</h1>
            <p><?php echo __FILE__;?></p>
        </header>
        <main>
            <section>
                <!-- Afffichage de la vue -->
                <?php $this->insertView(); ?>
            </section>            
        </main>
        <footer>
            footer
        </footer>
    </body>
</html>