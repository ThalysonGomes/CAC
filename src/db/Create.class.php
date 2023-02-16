<?php
/**
 * Autor: Thalyson Gomes
 * Empresa: ©Bioinfo 
 * Description:
 * Obs: 
 */
class Create extends Conn {
    /* ########################
      ### Variaveis Privadas ###
      ######################## */
    private $Insert;
    private $Dados;
    private $Query;
    private $Result;
    private $Conn;
    /* ########################
      #### Métodos Publicos ####
      ######################## */
    //Função de start para insert passando paramêmtros de tabela e dados.
    //Dados em formato de Array ['Nome da Coluna' => 'Valor'].
    /* @var Inteira*/
    public function SetCreate($Tabela, array $Dados) {
        $this->Dados = $Dados;
        $Colunas = implode(', ', array_keys($Dados));
        $Values = ':' . implode(", :", array_keys($Dados));
        $this->Insert = "INSERT INTO {$Tabela} ({$Colunas}) VALUES ({$Values})";
        $this->Executar();
    }
    //Retorna o ultimo registro inserido.
    public function getResultado() {
        return $this->Result;
    }
    /* ########################
      #### Métodos Privadas ####
      ######################## */
    //Realiza a conexão com o Banco e prepara o statement do PDO.
    private function Connect() {
        if (empty($this->Conn)) {
            $this->Conn = parent::getConn();
            $this->Query = $this->Conn->prepare($this->Insert);
            foreach ($this->Dados as $key => $value) {
                $this->Query->bindValue($key, $value, (is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR));
            }
        }
    }
    //Executa a Query.
    private function Executar() {
        $this->Connect();
        try {
            $this->Query->execute();
            $this->Result = $this->Conn->lastInsertId();
        } catch (PDOException $e) {
            die($e->getCode(). "<i class='fa fa-warning'></i> Erro ao realizar a leitura:". $e->getMessage(). $e->getFile(). $e->getLine());
        }
    }
}