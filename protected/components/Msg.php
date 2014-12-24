<?php
class Msg{
    public static function info( $message )
    {
        self::message( $message, 'info' );
    }

    /**
     * Add success message into queue.
     * @param string $message success message
     */
    public static function success( $message )
    {
        self::message( $message, 'success' );
    }

    /**
     * Add warning message into queue.
     * @param string $message warning message
     */
    public static function warning( $message )
    {
        self::message( $message, 'warning' );
    }

    /**
     * Add error message(s) into queue.
     * @param string|array $message error message(s). Can be simple string or $model->getErrors() array.
     */
    public static function error( $message )
    {
        if ( is_array( $message ) ) // array
            foreach ( $message as $msg ) // foreach element check...
                if ( is_array( $msg ) ) // if array, then [attribute=>[err1, err2, ...], ...]
                    self::error( $msg ); // recurse for element
                else
                    self::message( $msg, 'danger' ); // simple string
        else
            self::message( $message, 'danger' ); // simple string
    }

    /**
     * Add message into queue with specified type.<br>
     * NOTE: Internal use only.
     * @param string $message typed message text
     * @param string $type    type of the message. Available values: info, success, warning, error.
     */
    private static function message( $message, $type )
    {
        $_SESSION[ 'flash_messages' ][ ] = [ $message, $type ];
    }

    /**
     * Get array of messages. Format: [ [message, type], [message, type], ... ]
     * @return mixed array of messages.
     */
    public static function getMessages()
    {
        return $_SESSION[ 'flash_messages' ];
    }

    /**
     * Shows floating notifications. Also removes already shown messages from queue.
     * To dismiss notification, just click to it.
     */
    public static function show()
    {
        // register JS
        $js_flash_messages = "
            nextAnim($('.alert-fixed:not(:visible)'));
            function nextAnim(elems){
                elems.eq(0).slideDown(function(){
                    nextAnim(elems.slice(1));
                });
            }
            $('.alert-fixed').on('click', function(__event){
                $(this).slideUp();
            });
        ";

        Yii::app()->clientScript->registerScript( 'flash_messages', $js_flash_messages, CClientScript::POS_READY );

        // register CSS
        $css_flash_messages = "
            .alert-container {
              position: fixed;
              width: 300px;
              right: 5px;
              z-index: 100;
            }
            .alert-container .alert-fixed {
              margin: 3px;
              width: 300px;
              float: right;
              display: none;
            }
        ";

        Yii::app()->clientScript->registerCss( 'flash_messages', $css_flash_messages );

        // show messages
        if ( isset( $_SESSION[ 'flash_messages' ] ) )
        {
            ?>
            <div class="alert-container">
                <?php
                while ( $_SESSION[ 'flash_messages' ] )
                {
                    list( $txt, $type ) = array_shift( $_SESSION[ 'flash_messages' ] );
                    ?><span class="alert alert-fixed alert-<?= $type; ?>"><?= CHtml::encode( $txt ); ?></span><?php
                }
                ?>
            </div>
        <?php
        }
    }
}