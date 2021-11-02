<?php

class Helper
{
    public static function get_user_ip()
    {
    }

    public static function getProvider()
    {
        return gethostbyaddr($_SERVER['REMOTE_ADDR']);
    }

    
    /**
     * Mostrar um alerta html bootstrap
     * $tipo: success, info, warning, danger
     * $messagem: mensagem a ser exibida
     */
    public static function alert($tipo, $mensagem){
        return '<div class="alert alert-'.$tipo.'" role="alert">'.$mensagem.'</div>';
    }

}