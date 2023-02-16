<?php
/*
 * Autor: Thalyson Gomes
 * Empresa: ©Bioinfo 
 * Description: Realiza Leituras, tanto completas quanto com filtros em qualquer tabela do banco conectado.
 * Obs: Para realizar o resultado chamar functon getResultado() ou getNumlinhas().
 */
class Read extends Conn {
    /* ########################
      ### Variaveis Privadas ###
      ######################## */
    public $Select;
    private $Query;
    private $Valores;
    private $Result;
    private $Conn;
    /* ########################
      #### Métodos Publicos ####
      ##########################
     */
    //Função para realizar a leitura, setar a Tabela, Coluna, Filtro, e Valores.
    //Nos Filtro Colocar o WHERE antes das colunas a serem filtradas. colocar :nomedacoluna depois do = (Ex.: id=:id). Para Mais de 1 Filtro Colocar como padrao do SQL fazendo a mesma substituição do valor por :nomedacoluna (Ex.: id=:id, nome=:nome).
    //Nos Valores Colocar o nome colocado no :nomedacoluna e =valor tudo junto (Ex.:id=1). Para mais de 1 filtro Colocar & para proximos valores (Ex.: id=1&nome=Thalyson)
    public function SetRead($Tabela, $Colunas = '*', $Filtros = null, $Valores = null) {
        if (!empty($Valores)) {
            $this->Valores = explode('&', $Valores);
        }
        $this->Select = "SELECT {$Colunas} FROM {$Tabela} {$Filtros}";

        $this->Executar();
        
    }
    //Retorna Array[] de Resultados.
    public function getResultado() {
        return $this->Result;
    }
    //Retorna total de registros encontrados.
    public function getNumLinhas() {
        return $this->Query->rowcount();
    }

    /* ######################## 
      #### Métodos Privados ####
      ######################## */
    //Realiza a conexao com o banco de dados, monta a query com o select realizado na função setRead
    public function validaconect(){
        session_start();
        if(empty($_SESSION['codusuario'])){
           header("loaction: login.php");
       }
   }
   private function Connect() {
    $this->Conn = parent::getConn();
    $this->Query = $this->Conn->prepare($this->Select);
    $this->Query->setFetchMode(PDO::FETCH_ASSOC);
}
    //pega os valores monta o statement do PDO para realizar a query.
private function getSyntax() {

    if (!empty($this->Valores)) {
        foreach ($this->Valores as $key) {
            $Coluna = explode("=", $key)[0];
            $valor = explode("=", $key)[1];
            $this->Query->bindValue(":{$Coluna}", $valor, (is_int($valor) ? PDO::PARAM_INT : PDO::PARAM_STR));
        }
    }
}
    //Chama a função de Conexao, monta a syntax do statement pdo com a função getSyntax executa a query e coloca o valor na variavel privada Result
private function Executar() {
    $this->Connect();
    try {
        $this->getSyntax();
        $this->Query->execute();
        $this->Result = $this->Query->fetchAll();
    } catch (PDOException $e) {
        $this->Result = null;
        die($e->getCode(). "<i class='fa fa-warning'></i> Erro ao realizar a leitura:". $e->getMessage(). $e->getFile(). $e->getLine(). $e->getTrace());
    }
}
}