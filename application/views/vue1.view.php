<?php namespace Sistr; 

$this->setPageTitle("Vue 1");
//$this->addStyleSheet('css/background-red.css');
\F3il\Messages::setMessageRenderer('\Sistr\MessagesHelper::messagesRenderer');
?>
<!--[%MESSAGES%] -->

<div>
    <p><?php //echo __FILE__;?></p>
    <h1><?php echo $this->__get("titre");?></h1>
    <p><?php //echo $this->__get('run_mode');?></p>
    <table><?php 
         foreach ($this->utilisateurs as $user)
         {
             ?>
        <tr>
            <td><?php echo $user['nom']?></td>
            <td><?php echo $user['prenom']?></td>
            <td><?php echo $user['email']?></td>
            <td><?php echo $user['login']?></td>
            <td><?php echo $user['creation']?></td>
            <td><?php echo $user['connexion']?></td>
        </tr>
        <?php
         }
    ?>
    </table>
</div>

