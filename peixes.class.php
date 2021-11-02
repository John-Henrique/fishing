<?php

/**
 * Classe Peixe
 * Define as caracteristicas dos peixes do jogo, raridade, peso, etc.
 */
class Peixe {

    private $nome;
    private $raridade;
    private $peso;
    private $imagem;

    /**
     * Construtor da classe Peixes
     * @param $nome
     * @param $raridade
     * @param $peso
     * @param $imagem
     */
    public function __construct($nome, $raridade, $peso, $imagem) {
        $this->nome = $nome;
        $this->raridade = $raridade;
        $this->peso = $this->formataPeso( $peso );
        $this->imagem = $this->formataImagem( $imagem, $nome );

    }


    protected function formataImagem( $imagem, $nome = '' ){
        return '<img src="./imagens/Peixes/'. $imagem .'" alt="'. $this->nome .'" title="'. $this->nome .'">';
    }

    protected function formataPeso( $peso ) {
        return number_format( $peso, 2, ',', '.') ." Kg";
    }

    /**
     * Retorna o nome do peixe
     * @return mixed
     */
    public function getNome() {
        return $this->nome;
    }

    /**
     * Retorna a raridade do peixe
     * @return mixed
     */
    public function getRaridade() {
        return $this->raridade;

    }

    /**
     * Retorna o peso do peixe
     * @return mixed
     */
    public function getPeso() {
        return $this->peso;
    }

    /**
     * Retorna a imagem do peixe
     * @return mixed
     */
    public function getImagem() {
        return $this->imagem;
    }

}



/**
 * Classe Peixes que extende a classe Peixe
 * Manipula os peixes do jogo
 */
class Peixes {

    private $peixes = array();


    /**
     * Retorna o array de peixes
     * @return array
     */
    public function getPeixes() {
        return $this->peixes;
    }

    /**
     * Retorna o nome do peixe
     * @return mixed
     */
    public function getNome() {
        return $this->nome;
    }


    public function getPeso() {
        return $this->peso;
    }


    public function getImagem() {
        return $this->imagem;
    }

    /**
     * Retorna a raridade do peixe
     * @return mixed
     */
    public function getRaridade() {
        return $this->raridade;
    }



    /**
     * Criar função de aleatoriedade para peixes seguindo os critérios abaixo 
     * 39%  comum
     * 25% incomum
     * 20% raro
     * 10% mítica
     * 5% Épica
     * 1% Lendária
     */
    public function geraAleatorio() {
        $num = random_int(0, 100);
        if ($num <= 39) {

            $array = $this->peixeComum();
            $this->nome = $array['nome'];
            $this->raridade = "Comum";
            $this->peso = $array['peso'];
            $this->imagem = $array['imagem'];
        } elseif ($num <= 65) {

            $array = $this->peixeIncomum();
            $this->nome = $array['nome'];
            $this->raridade = "Incomum";
            $this->peso = $array['peso'];
            $this->imagem = $array['imagem'];
        } elseif ($num <= 86) {

            $array = $this->peixeRaro();
            $this->nome = $array['nome'];
            $this->raridade = "Raro";
            $this->peso = $array['peso'];
            $this->imagem = $array['imagem'];
        } elseif ($num <= 94) {

            $array = $this->peixeMitico();
            $this->nome = $array['nome'];
            $this->raridade = "Mítico";
            $this->peso = $array['peso'];
            $this->imagem = $array['imagem'];
        } elseif ($num <= 99) {
            
            $array = $this->peixeEpico();
            $this->nome = $array['nome'];
            $this->raridade = "Épico";
            $this->peso = $array['peso'];
            $this->imagem = $array['imagem'];
        } else {

            $array = $this->peixeLendario();
            $this->nome = $array['nome'];
            $this->raridade = "Lendária";
            $this->peso = $array['peso'];
            $this->imagem = $array['imagem'];
        }

        //return $this->nome . " " . $this->raridade . " " . $this->peso . " " . $this->imagem;
        return array($this->nome, $this->raridade, $this->peso, $this->imagem);
    }


    protected function peixeComum() {
        $array = array();

        $array[] = array(
            "nome" => "Piranha",
            "peso" => rand(1,2),
            "imagem" => "Piranha.png"
        ); 
        $array[] = array(
            "nome" => "Arraia",
            "peso" => rand(1,2),
            "imagem" => "Arraia.png"
        );
        $array[] = array(
            "nome" => "Peixe bandeira",
            "peso" => 0.100,
            "imagem" => "Peixe bandeira.png"
        );
        return $array[random_int(0, count( $array ) - 1)];
    }


    

    protected function peixeIncomum() {
        $array = array();

        $array[] = array(
            "nome" => "Moreia",
            "peso" => rand(1,2),
            "imagem" => "Moreia.png"
        ); 
        $array[] = array(
            "nome" => "Magrove",
            "peso" => rand(1,2),
            "imagem" => "Magrove.png"
        ); 
        $array[] = array(
            "nome" => "Lagosta",
            "peso" => rand(1,2),
            "imagem" => "Lagosta.png"
        ); 
        return $array[random_int(0, count( $array ) - 1)];
    }

    

    protected function peixeRaro() {
        $array = array();

        $array[] = array(
            "nome" => "Magrove",
            "peso" => rand(2,5),
            "imagem" => "Magrove.png"
        ); 
        $array[] = array(
            "nome" => "Lagosta",
            "peso" => rand(10,20),
            "imagem" => "Lagosta.png"
        );         
        $array[] = array(
            "nome" => "Arraia",
            "peso" => rand(20,50),
            "imagem" => "Arraia.png"
        );
        return $array[random_int(0, count( $array ) - 1)];
    }


    protected function peixeMitico() {
        $array = array();

        $array[] = array(
            "nome" => "Moreia",
            "peso" => rand(15,30),
            "imagem" => "Moreia.png"
        ); 
        $array[] = array(
            "nome" => "Golfinho",
            "peso" => rand(30,60),
            "imagem" => "Golfinho.png"
        ); 
        $array[] = array(
            "nome" => "Peixe anjo",
            "peso" => rand(10,20),
            "imagem" => "Peixe Anjo.png"
        );
        $array[] = array(
            "nome" => "Barracuda",
            "peso" => rand(5,10),
            "imagem" => "barracuda.png"
        );
        return $array[random_int(0, count( $array ) - 1)];
    }


    protected function peixeEpico() {
        $array = array();

        $array[] = array(
            "nome" => "Moreia",
            "peso" => rand(15,30),
            "imagem" => "Moreia.png"
        ); 
        $array[] = array(
            "nome" => "Peixe Gato / Bagre azul",
            "peso" => rand(10,40),
            "imagem" => "Peixe Gato.png"
        ); 
        return $array[random_int(0, count( $array ) - 1)];
    }



    // Seleciona um peixe lendário aleatório
    protected function peixeLendario(){

        $array = array();

        $array[] = array(
            "nome" => "Bacalhau",
            "peso" => rand(50,96),
            "imagem" => "Bacalhau.png"
        );
        $array[] = array(
            "nome" => "Peixe gato / Bagre azul",
            "peso" => rand(30,60),
            "imagem" => "Peixe Gato.png"
        );
        $array[] = array(
            "nome" => "Tuna",
            "peso" => rand(220,250),
            "imagem" => "Tuna.png"
        );
        $array[] = array(
            "nome" => "Orca",
            "peso" => rand(1000,4000),
            "imagem" => "Orca - Baleia Assassina.png"
        );
    
        return $array[random_int(0, count( $array ) - 1)];
    }

    
    
    public function geraAleatorioB() {
        $num = random_int(0, 100);
        if ($num <= 39) {
            $this->nome = "Peixe Comum";
            $this->raridade = "Comum";
            $this->peso = rand(1, 10);
            $this->imagem = "peixe_comum.png";
        } elseif ($num <= 65) {
            $this->nome = "Peixe Incomum";
            $this->raridade = "Incomum";
            $this->peso = rand(1, 10);
            $this->imagem = "peixe_incomum.png";
        } elseif ($num <= 86) {
            $this->nome = "Peixe Raro";
            $this->raridade = "Raro";
            $this->peso = rand(1, 10);
            $this->imagem = "peixe_raro.png";
        } elseif ($num <= 94) {
            $this->nome = "Peixe Mítico";
            $this->raridade = "Mítico";
            $this->peso = rand(1, 10);
            $this->imagem = "peixe_mitico.png";
        } elseif ($num <= 99) {
            $this->nome = "Peixe Épica";
            $this->raridade = "Épica";
            $this->peso = rand(1, 10);
            $this->imagem = "peixe_epica.png";
        } else {
            $this->nome = "Peixe Lendária";
            $this->raridade = "Lendária";
            $this->peso = rand(1, 10);
            $this->imagem = "peixe_lendaria.png";
        }

        //return $this->nome . " " . $this->raridade . " " . $this->peso . " " . $this->imagem;
        return array($this->nome, $this->raridade, $this->peso, $this->imagem);
    }



    // varre o diretório imagens/Peixes e lista todas as imagens png
    public function listaImagens() {
        $diretorio = "imagens/Peixes";
        $arquivos = scandir($diretorio);
        $imagens = array();
        foreach ($arquivos as $arquivo) {
            if (strpos($arquivo, ".png") !== false) {
                $imagens[] = $arquivo;
            }
        }
        return $imagens;
    }


}

$peixe = new Peixes();

$peixes_comuns =
$peixes_incomuns =
$peixes_raros = 
$peixes_miticos =
$peixes_epicas =
$peixes_lendarias = 0;

$total = 1;

/**
 * faz um loop 1000 vezes para gerar 1000 peixes enumerados 
 * e armazenados no array peixes 
 * calcula o percentual de peixes comuns, incomuns, raros, míticos, épicos e lendários
 */
for ($i = 0; $i < $total; $i++) {
    $peixe2 = $peixe->geraAleatorio();

    if($peixe2[1] == "Comum") {
        $peixes_comuns++;
    } elseif ($peixe2[1] == "Incomum") {
        $peixes_incomuns++;
    } elseif ($peixe2[1] == "Raro") {
        $peixes_raros++;
    } elseif ($peixe2[1] == "Mítico") {
        $peixes_miticos++;
    } elseif ($peixe2[1] == "Épica") {
        $peixes_epicas++;
    } else {
        $peixes_lendarias++;
    }
    //echo $i ." ". $peixe2[1] . "<br>";

    print_r( new Peixe($peixe->getNome(), $peixe->getRaridade(), $peixe->getPeso(), $peixe->getImagem()) );
}

// percentual de peixes
echo "Comuns ". $peixes_comuns ." -> ". ($peixes_comuns / $total) * 100 . "% <br>";
echo "Incomuns ". $peixes_incomuns ." -> ". ($peixes_incomuns / $total) * 100 . "% <br>";
echo "Raros ". $peixes_raros ." -> ". ($peixes_raros / $total) * 100 . "% <br>";
echo "Míticos ". $peixes_miticos ." -> ". ($peixes_miticos / $total) * 100 . "% <br>";
echo "Épicos ". $peixes_epicas ." -> ". ($peixes_epicas / $total) * 100 . "% <br>";
echo "Lendários ". $peixes_lendarias ." -> ". ($peixes_lendarias / $total) * 100 . "% <br>";


/*
foreach( $peixe->listaImagens() as $imagem) {
    echo "<img src='imagens/Peixes/$imagem' width='200'>";
}
*/



?>