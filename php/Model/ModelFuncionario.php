<?php
class ModelFuncionario {

	public $idFuncionario;
	public $nome; 
	public $salario;
	public $login;
	public $senha; 
	public $idPermissao;
	public $idDepartamento;

    /**
     * Popula um obj funcionario com os dados vindos da tabela funcionario. Funciona como um construtor
     *
     * @param um array com dados da tupla proveniente do DB, em que o nome do atributo na entidade é o mesmo do atributo no objeto
     *
     * @return não há retorno.
     */
    public function setFuncionarioFromDataBase($linha){
        $this->setIdFuncionario($linha["idFuncionario"])
               ->setNome($linha["nome"])
               ->setSalario($linha["salario"])
               ->setLogin($linha['login'])
               ->setSenha($linha['senha'])
               ->setIdPermissao($linha['idPermissao'])
               ->setIdDepartamento($linha['idDepartamento']);
    }
    public function setFuncionarioFromPOST(){
        $this->setIdFuncionario(null)
               ->setNome($_POST["nome"])
               ->setSalario($_POST["salario"])
               ->setLogin($_POST['login'])
               ->setSenha($_POST['senha'])
               ->setIdPermissao(1)
               ->setIdDepartamento(1);
    }

    /**
     * Gets the value of idFuncionario.
     *
     * @return mixed
     */
    public function getIdFuncionario()
    {
        return $this->idFuncionario;
    }

    /**
     * Sets the value of idFuncionario.
     *
     * @param mixed $idFuncionario the id funcionario
     *
     * @return self
     */
    public function setIdFuncionario($idFuncionario)
    {
        $this->idFuncionario = $idFuncionario;

        return $this;
    }

    /**
     * Gets the value of nome.
     *
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Sets the value of nome.
     *
     * @param mixed $nome the nome
     *
     * @return self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Gets the value of salario.
     *
     * @return mixed
     */
    public function getSalario()
    {
        return $this->salario;
    }

    /**
     * Sets the value of salario.
     *
     * @param mixed $salario the salario
     *
     * @return self
     */
    public function setSalario($salario)
    {
        $this->salario = $salario ;

        return $this;
    }

    /**
     * Gets the value of login.
     *
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Sets the value of login.
     *
     * @param mixed $login the login
     *
     * @return self
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Gets the value of senha.
     *
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Sets the value of senha.
     *
     * @param mixed $senha the senha
     *
     * @return self
     */
    public function setSenha($senha)
    {
        $this->senha = password_hash($senha, PASSWORD_DEFAULT);

        return $this;
    }

    /**
     * Gets the value of idPermissao.
     *
     * @return mixed
     */
    public function getIdPermissao()
    {
        return $this->idPermissao;
    }

    /**
     * Sets the value of idPermissao.
     *
     * @param mixed $idPermissao the id permissao
     *
     * @return self
     */
    public function setIdPermissao($idPermissao)
    {
        $this->idPermissao = $idPermissao;
        return $this;
    }

    /**
     * Gets the value of idDepartamento.
     *
     * @return mixed
     */
    public function getIdDepartamento()
    {
        return $this->idDepartamento;
    }

    /**
     * Sets the value of idDepartamento.
     *
     * @param mixed $idDepartamento the id departamento
     *
     * @return self
     */
    public function setIdDepartamento($idDepartamento)
    {
        $this->idDepartamento = $idDepartamento;

        return $this;
    }
}