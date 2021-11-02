<?php 

require_once "carteira.class.php";


/**
 * Classe para controlar a exchange de compra das moedas
 */
class Exchange {


    /**
     * Construtor da classe
     */
    public function __construct() {
        
    }


    /**
     * Função para realizar a exchange de moedas
     * @param $user_id
     * @param $coin_id
     * @param $amount
     * @return bool
     */
    public function exchange( $usuario_id, $valor ){
        $carteira = new Carteira();
        echo $carteira->adicionarSaldo( $usuario_id, $valor );
    }


    /**
     * Função para exibir o formulário 
     * com campo para informar o valor 
     * e botão enviar
     */
    public function formExchange(){
        ?>
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4 ">
                    <BR><BR><BR>
                    <h1>Exchange</h1>
                    <form action="?page=exchange&comprar" method="post">
                        <div class="form-group">
                            <label for="valor">Quantas moedas deseja adquirir?</label>
                            <input type="text" class="form-control" id="valor" name="valor" placeholder="Valor">
                        </div>
                        <BR>
                        <button type="submit" class="btn btn-primary">Comprar moedas</button>
                    </form>
                </div>
                <div class="col-md-4">
                </div>
            </div>
        <?php
    }
}




$exchange = new Exchange();

?>

<div class="container">
<?php 
if( isset( $_GET['comprar'] ) ){
    
    $exchange->exchange( 1, (int) $_POST['valor'] );
}

$exchange->formExchange();
?>

</div>
