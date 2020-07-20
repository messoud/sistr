<?php
namespace Sistr;
defined('SISTR') or die('Acces interdit');
use \F3il\Messages;

abstract class MessagesHelper {
    public static function messagesRenderer() {
        ?>
        <div id="messages">
        <?php
        for($i=0;$i<Messages::getMessageCount();$i++){
            $msg = Messages::getMessage($i);
            switch ($msg['type']){
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
                <i class="glyphicon <?php echo $icone;?>"></i> <?php echo $msg['message'];?>
            </div>
            <?php                       
        }
        ?>
        </div>
        <?php
    }
}