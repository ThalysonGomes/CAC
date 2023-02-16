<?php
/*
 * Autor: Thalyson Gomes
 * Empresa: ©Bioinfo 
 * Description: 
 * Obs: 
 */
class Delete extends Conn {
    /* ########################
      ### Variaveis Privadas ###
      ######################## */
    private $Delete;
    private $Query;
    private $Valores;
    private $Result;
    private $Conn;
    /* ########################
      #### Métodos Publicos ####
      ##########################
     */
    //Função para realizar o delete, setar a Tabela, Filtro, e Valores.
    //Nos Filtro Colocar o WHERE antes das colunas a serem filtradas. colocar :nomedacoluna depois do = (Ex.: id=:id). Para Mais de 1 Filtro Colocar como padrao do SQL fazendo a mesma substituição do valor por :nomedacoluna (Ex.: id=:id, nome=:nome).
    //Nos Valores Colocar o nome colocado no :nomedacoluna e =valor tudo junto (Ex.:id=1). Para mais de 1 filtro Colocar & para proximos valores (Ex.: id=1&nome=Thalyson)
    public function SetDelete($Tabela, $Filtros, $Valores) {
        parse_str($Valores, $this->Valores);
        $this->Select = "DELETE FROM {$Tabela} {$Filtros}";
        $this->Executar();
    }
    //Retorna Array[] de Resultados.
    public function getResultado() {
        return $this->Result;
    }
    /* ######################## 
      #### Métodos Privados ####
      ######################## */
    //Realiza a conexao com o banco de dados, monta a query com o delete realizado na função setDelete
    private function Connect() {
        $this->Conn = parent::getConn();
        $this->Query = $this->Conn->prepare($this->Select);
    }
    //pega os valores monta o statement do PDO para realizar a query.
    private function getSyntax() {
        foreach ($this->Valores as $Coluna => $valor) {
            $this->Query->bindValue(":{$Coluna}", $valor, (is_int($valor) ? PDO::PARAM_INT : PDO::PARAM_STR));
        }
    }
    //Chama a função de Conexao, monta a syntax do statement pdo com a função getSyntax executa a query e coloca o valor na variavel privada Result
    private function Executar() {
        $this->Connect();
        try {
            $this->getSyntax();
            $this->Query->execute();
            $this->Result = true;
        } catch (PDOException $e) {
            $this->Result = null;
            die($e->getCode(). "<i class='fa fa-warning'></i> Erro ao realizar a leitura:". $e->getMessage(). $e->getFile(). $e->getLine());
        }
    }
}