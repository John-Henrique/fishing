<?php 



/**
 * Query page para determinar quais as páginas do site estão ativas
 * Verificar se o valor do swich está completo
 * adicionar os casos
 * principal
 * marketplace
 * pesca
 * exchange
 */
/*
switch ( isset( $_GET['page'] )? $_GET['page'] : '' ) {
    case 'principal':
        $page = 'principal';
        break;
    case 'marketplace':
        $page = 'marketplace';
        break;
    case 'pesca':
        $page = 'pesca';
        break;
    case 'exchange':
        $page = 'exchange';
        break;
    default:
        $page = 'index';
        break;
}
*/

/**
 * Verifica se o parametro page está setado
 * Se estiver setado, verifica se o valor é corresponde a um arquivo válido
 * se o arquivo existir, carrega o arquivo
 * */
if ( isset( $_GET['page'] ) ) {
    echo $page = strtolower( $_GET['page'] );
    
    if ( file_exists( './' . $page . '.class.php' ) ) {
        include './' . $page . '.class.php';
    } else {
        include './404.php';
    }

}

?>