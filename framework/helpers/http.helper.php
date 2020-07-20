<?php
namespace F3il;
defined('F3IL') or die('Acces interdit');

abstract class HttpHelper {
    public static function redirect($url) {
        if(!headers_sent()):
            header('Location: '.$url);
        else:
            ?>
            <script type="text/javascript">
                window.location = "<?php echo $url;?>";
            </script>
            <?php
        endif;
    }
}