<?php 


require_once "helper.class.php";

/**
 * Classe Carteira
 * Classe responsável por gerenciar as carteiras
 */
class Carteira {

    /**
     * @var int $id
     * @access private
     */
    private $id;

    /**
     * @var string $nome
     * @access private
     */
    private $nome;

    /**
     * @var string $descricao
     * @access private
     */
    private $descricao;

    /**
     * @var int $status
     * @access private
     */
    private $status;

    /**
     * @var int $usuario_id
     * @access private
     */
    private $usuario_id;


    private $saldo;


    public function __construct() {
        $this->id = 0;
        $this->nome = '';
        $this->descricao = '';
        $this->status = 0;
        $this->usuario_id = 0;


        // caso não haja valor em $saldo, inicia a sessão com um valor aleatorio
        if (!isset($_SESSION['saldo'])) {
            $_SESSION['saldo'] = rand(500, 5000);
        }
    }


    // define o valor do saldo
    public function setSaldo($saldo) {
        
        $_SESSION['saldo'] = $this->saldo = $saldo;
    }


    /**
     * Recupera o saldo da carteira ao informar o usuário
     */
    public function getSaldo( $usuario_id ) {
        
        /**
         * Simula que estivesse recuperando dinheiro do banco de dados
         */
        $this->saldo = $_SESSION['saldo'];

        // retprma o saldo da carteira com 2 casas decimais
        return $this->saldo;
    }



    /**
     * Adiciona saldo na carteira ao informar o usuário e valor
     */
    public function adicionarSaldo( $usuario_id, $valor ) {

        $helper = new Helper();
        
        /**
         * Simula que estivesse adicionando dinheiro no banco de dados
         */

        $saldoAtual = $this->getSaldo( $usuario_id );

        $this->setSaldo( $saldoAtual + $valor );

        return $helper->alert( "success", "Saldo adicionado a sua carteira" );
    }


    /**
     * Retira saldo na carteira ao informar o usuário e valor
     */
    public function retirarSaldo( $usuario_id, $valor ) {
        
        /**
         * Simula que estivesse retirando dinheiro no banco de dados
         */
        $this->setSaldo( $this->getSaldo( $usuario_id ) - $valor );

        return $this->saldo;
    }

}
?>