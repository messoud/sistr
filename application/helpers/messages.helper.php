<?php namespace Sistr;
    if(!defined('SISTR')) {throw new Error('Acces interdit');}
use \F3il\Messages;
/**
 * Description of messages
 *
 * @author video
 */
abstract class MessagesHelper {
    
    /*static function messagesRenderer()
    {
        echo "ici" .__METHOD__ ;
    }*/
     
     
    public static function messagesRenderer() {
        ?>
        <div id="messages">
        <?php
       
        for($i=0;$i<Messages::getMessagesCount();$i++){
            $msg = Messages::getMessage($i);
            // echo 'ici'.Messages::getMessagesCount().' '.$msg;
            switch ($msg[$i]){
                case Messages::MESSAGE_SUCCESS:
                    $class = "alert-success";
                    $icone = 'glyphicon-ok-sign';
                    break;
                case Messages::MESSAGE_WARNING:
                    $class = "alert-warning";
                    $icone = 'glyphicon-info-sign';
                    break;
                case Messages::MESSAGE_ERROR:
                    $class = "alert-danger";
                    $icone = 'glyphicon-remove-sign';
                    break;
            }
            ?>
            <div class="alert <?php echo $class;?>">
                <i class="glyphicon <?php echo $icone;?>"></i> <?php echo $msg;?>
            </div>
            <?php                       
        }
        ?>
        </div>
        <?php
    }
     
     
}
