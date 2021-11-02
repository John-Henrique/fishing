<?php 

/**
 * Classe para gerenciar os pescadores
 */
class Pescador {

    public $id;
    public $nome;
    public $imagem;
    public $descricao;

    /**
     * Construtor da classe
     * @param $id
     * @param $nome
     * @param $imagem
     * @param $descricao
     */
    public function __construct($id, $nome, $imagem, $descricao) {
        $this->id = $id;
        $this->nome = $nome;
        $this->imagem = $imagem;
        $this->descricao = $descricao;
    }


    /**
     * Retorna um array com os dados do pescador
     * @return array
     */
    public function getDados() {
        return array(
            'id' => $this->id,
            'nome' => $this->nome,
            'imagem' => $this->imagem,
            'descricao' => $this->descricao
        );

    }
}



class Pescadores {

    /**
     * Definindo pescadores
     */
    public static function getPescadores() {
        $pescadores = array();

        $pescadores[] = new Pescador(1, 'João',       'Pescador1.png', 'Descrição do pescador 1');
        $pescadores[] = new Pescador(2, 'Carlos',     'Pescador2.png', 'Descrição do pescador 2');
        $pescadores[] = new Pescador(3, 'Beatriz',    'Pescadora3.png', 'Descrição do pescador 3');
        $pescadores[] = new Pescador(4, 'Maria',      'Pescadora2.png', 'Descrição do pescador 4');
        $pescadores[] = new Pescador(5, 'Joana',      'Pescadora1.png', 'Descrição do pescador 5');

        return $pescadores;
    }

}


$pescadores = new Pescadores();
foreach( $pescadores->getPescadores() as $pescador ) {
    /*
    echo '<pre>';
    print_r($pescador->getDados());
    echo '</pre>';
    */
}
/**
 * Percorre o array $pescadores e lista todos os dados
 * em colunas usando bootstrap
 */
?>
<div class="container">
    <div class="row">
<?php 
foreach( $pescadores->getPescadores() as $pescador ) {
    echo '<div class="col">';
    echo '<a href="?page=marketplace&id='. $pescador->id .'">';
    echo '  <div class="card bg-light">';
    echo '    <img src="imagens/Pescadores/'.$pescador->imagem.'" alt="'.$pescador->nome.'" class="border border-third card-img-top" width="200" >';
    echo '    <div class="card-body">';
    echo '        <h3 class="card-title">'. $pescador->nome .'</h3>';
    echo '        <p class="card-text">'.$pescador->descricao.'</p>';
    echo '    </div>';
    echo '  </div>';
    echo '</a>';
    echo '</div>';
}
?>
    </div>
</div>