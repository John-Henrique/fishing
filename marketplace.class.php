<?php 

require_once "helper.class.php";
require_once "carteira.class.php";

/**
 * Criar uma classe para o marketplace
 * definir os atributos ID, Imagem, Nome, Preço, Raridade e Level
 * definir os métodos para acessar os atributos
 * definir um método para mostrar os dados
 * criar uma UI em html para mostrar os dados
 * 
 */
class Marketplace
{
    private $id;
    private $imagem;
    private $nome;
    private $preco;
    private $raridade;
    private $level;
    
    
    public function __construct()
    {
        /*
        $this->id = $id;
        $this->imagem = "<img src='./imagens/". $imagem .".png' alt='". $nome ."' title='". $nome ."' width='100%'>";
        $this->nome = $nome;
        $this->preco = $this->setPreco( $preco );
        $this->raridade = $this->setRaridade( $raridade );
        $this->level = $level;
        */
    }


    /**
     * Define o preço do item 
     * formata o valor para o padrão brasileiro 
     * adiciona o símbolo de F$
     */
    public function setPreco($preco){
        return $this->preco = "R$ ". number_format($preco, 2, ',', '.');
    }


    public function setImagem($imagem, $nome = "" ){
        return $this->imagem = "<img src='./imagens/". $imagem .".png' alt='". $nome ."' title='". $nome ."' width='100%'>";
    }



    // define a raridade do item
    public function setRaridade($raridade)
    {
        // switch para definir a raridade do item
        switch ($raridade) {
            case '0':
                return $this->raridade = '<i class="bi bi-star-fill" style="color: #EACE2D;"></i>';
                break;

            case '1':
                return $this->raridade = '<i class="bi bi-star-fill" style="color: #EACE2D;"></i><i class="bi bi-star-fill style="color: #EACE2D;""></i>';
                break;
            
            case '2':
                return $this->raridade = '<i class="bi bi-star-fill" style="color: #EACE2D;"></i><i class="bi bi-star-fill" style="color: #EACE2D;"></i><i class="bi bi-star-fill" style="color: #EACE2D;"></i>';
                break;

            case '3':
                return $this->raridade = '<i class="bi bi-star-fill" style="color: #EACE2D;"></i><i class="bi bi-star-fill" style="color: #EACE2D;"></i><i class="bi bi-star-fill" style="color: #EACE2D;"></i><i class="bi bi-star-fill style="color: #EACE2D;"" style="color: #EACE2D;"></i>';
                break;

            case '4':
                return $this->raridade = '<i class="bi bi-star-fill" style="color: #EACE2D;"></i><i class="bi bi-star-fill" style="color: #EACE2D;"></i><i class="bi bi-star-fill" style="color: #EACE2D;"></i><i class="bi bi-star-fill" style="color: #EACE2D;"></i><i class="bi bi-star-fill" style="color: #EACE2D;"></i>';
                break;

            default:
                return $this->raridade = '<i class="bi bi-star-fill" style="color: #EACE2D;"></i>';
                break;
        }
    }



    /**
     * Mostrar todos os dados do marketplace
     * listados em uma grid html e bootstrap
     * compativel com dispositivos móveis
     */
    public function mostraProduto( $produto ){
        
        echo "<div class='col-3'>";
            echo "<a href='?page=marketplace&comprar=". $produto['id'] ."'>";
                echo "<div class='p-3 border bg-light'>";
                    echo "ID: " .$produto['id'] . "<br>";
                    echo $this->setImagem( $produto['imagem'], $produto['nome'] ) . "<br>";
                    echo $produto['nome'] . "<br>";
                    echo "Preço: " .$this->setPreco(  $produto['preco'] ). "<br>";
                    echo "Raridade: " . $this->setRaridade( $produto['raridade'] ) . "<br>";
                    echo "Level: ". $produto['level'] . "<br>";    
                echo "</div>";
            echo "</a>";
        echo "</div>";
    }



    /**
     * Compra um item do marketplace
     * verifica se o valor está correto 
     * reduz o saldo da carteira
     */
    public function comprarItem( $produto_id ){
        
        $produto_id = $this->getProduto( $produto_id );

        
        $helper = new Helper();



        // verifica se o produto existe
        if( $produto_id == false ){
            return $helper->alert( "warning", "Produto não encontrado" );
        }else{

            $carteira = new Carteira();
            $saldo = $carteira->getSaldo( 1 );


            $preco = $produto_id['preco'];



            // verificando se ha saldo suficiente
            if( $saldo >= $preco ){

                $carteira->retirarSaldo( 0, $preco );
                return $helper->alert( "success ", "Compra realizada com sucesso" );

            }else{
                /**
                 * calcular quanto falta para comprar o item e informar
                 */
                $falta = $preco - $saldo;

                return $helper->alert( "warning", "Saldo insuficiente. Você precisa ter mais ". $falta ." para comprar este item" );
            }
        }
    }


    /**
     * Retorna os dados do produto informado por $produto_id
     */
    protected function getProduto( $produto_id ){

        $produtos = $this->getProdutos();

        // valor do produto que será retornado
        return ( isset( $produtos[ $produto_id ]['preco'] ) )? $produtos[ $produto_id ] : false;

    }

    /**
     * Simula recuperar produtos do banco de dados
     */
    public function getProdutos(){
        $array = array();
        $array[1551] = array(
                    'id' => "1551",
                    'imagem' => "Varas/rod1",
                    'nome' => "Vara de pesca",
                    'preco' => "300",
                    'raridade' => '0',
                    'level' => "1");
        $array[2787] = array(
                    'id' => "2787",
                    'imagem' => "Varas/rod2",
                    'nome' => "Vara de pesca",
                    'preco' => "268",
                    'raridade' => '0',
                    'level' => "1");
        $array[3326] = array(
                    'id' => "3326",
                    'imagem' => "Varas/rod4",
                    'nome' => "nome 3",
                    'preco' => "800",
                    'raridade' => '4',
                    'level' => "1");
        $array[4822] = array(
                    'id' => "4822",
                    'imagem' => "Varas/rod6",
                    'nome' => "nome 4",
                    'preco' => "69",
                    'raridade' => '6',
                    'level' => "1");
        $array[5922] = array(
                    'id' => "5922",
                    'imagem' => "Varas/rod5",
                    'nome' => "nome 5",
                    'preco' => "80",
                    'raridade' => '5',
                    'level' => "1");
        $array[6070] = array(
                    'id' => "6070",
                    'imagem' => "Varas/rod7",
                    'nome' => "nome 6",
                    'preco' => "6900",
                    'raridade' => '2',
                    'level' => "5");
        $array[7893] = array(
                    'id' => "7893",
                    'imagem' => "Varas/rod3",
                    'nome' => "nome 7",
                    'preco' => "150",
                    'raridade' => '3',
                    'level' => "1");

        return $array;
    }

}




$marketplace = new marketplace();



// verificando se foi solicitada a compra de um item
if( isset( $_GET['comprar'] ) ){
    echo "<div class=\"container\">";
        echo $marketplace->comprarItem( $_GET['comprar'] );	
    echo "</div>";
}
?>

<div class="container overflow-hidden">
    <div class="row gy-5">
        <?php 
            foreach( $marketplace->getProdutos() as $produto){
                $marketplace->mostraProduto($produto);
            }
        ?>
    </div>
</div>