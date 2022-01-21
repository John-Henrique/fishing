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
    public static function getPescadores( $pescador_id = null ) {
        $pescadores = array();

        $pescadores[] = new Pescador(1, 'João',       'Pescador1.png', 'Descrição do pescador 1');
        $pescadores[] = new Pescador(2, 'Carlos',     'Pescador2.png', 'Descrição do pescador 2');
        $pescadores[] = new Pescador(3, 'Beatriz',    'Pescadora3.png', 'Descrição do pescador 3');
        $pescadores[] = new Pescador(4, 'Maria',      'Pescadora2.png', 'Descrição do pescador 4');
        $pescadores[] = new Pescador(5, 'Joana',      'Pescadora1.png', 'Descrição do pescador 5');

        if( $pescador_id ){
            print_r( array_search( $pescador_id , $pescadores ) );
            return $_SESSION['pescador_id'] = array_search( $pescador_id , array_column( $pescadores, 'id' ) );
        }else{
            return $pescadores;
        }
    }


    /**
     * Seleciona o pescador
     */
    public function getPescador( $pescador_id ) {
        $pescadores = self::getPescadores();
        $_SESSION['pescador_id'] = $pescadores[$pescador_id]['id'];
        
        $pescador = $pescadores[$pescador_id];
        $dados = $pescador->getDados();
        $html = '<div class="container">';
        $html .= '<div class="row">';
        $html .= '<div class="col">';
        $html .= '</div>';
        $html .= '  <div class="col">';
        $html .= '      <div class="card">';
        $html .= '          <img src="imagens/Pescadores/'. $dados['imagem'] .'" class="card-img-top" alt="'.$dados['nome'].'">';
        $html .= '          <div class="card-body">';
        $html .= '              <h5 class="card-title">'.$dados['nome'].'</h5>';
        $html .= '              <p class="card-text">'.$dados['descricao'].'</p>';
        $html .= '          </div>';
        $html .= '      </div>';
        $html .= '  </div>';
        $html .= '<div class="col">';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        return $html;
    }




}


$pescadores = new Pescadores();

if( isset( $_GET['pescador_id'] ) ){
    echo $pescadores->getPescadores( $_GET['pescador_id'] );
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

    $id = $pescador->id;

    $selecionado = ($_SESSION['pescador_id'] == $id )?"selecionado":'';

    echo '<div class="col">';
    echo '<a href="?page=marketplace&pescador_id='. $pescador->id .'">';
    echo '  <div class="card bg-light "'. $selecionado .'">';
    echo '    <img src="imagens/Pescadores/'.$pescador->imagem.'" alt="'.$pescador->nome.'" class="border border-third card-img-top" width="200" >';
    echo '    <div class="card-body">';
    echo '        <h3 class="card-title">'. $pescador->nome . $selecionado.'</h3>';
    echo '        <p class="card-text">'.$pescador->descricao.'</p>';
    echo '    </div>';
    echo '  </div>';
    echo '</a>';
    echo '</div>';
    
}
?>
    </div>
</div>