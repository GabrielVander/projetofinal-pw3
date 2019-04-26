<?php
//Add a classe responsavel por fazer a conexao com banco de dados
include_once $_SESSION["root"].'php/DAO/DatabaseConnection.php';
include_once $_SESSION["root"].'php/Model/ModelFuncionario.php';
class FuncionarioDAO {
	/*Como o PHP tem inferência de tipo, esse método, assim como outros, poderia ser mais "simples", porém estou fazendo de uma maneira que acho mais didático*/
	function getAllFuncionarios(){	

		//pego uma ref da conexão
		$instance = DatabaseConnection::getInstance();
		$conn = $instance->getConnection();

		//Faço o select usando prepared statement
		$statement = $conn->prepare("SELECT * FROM funcionario");		
		$statement->execute();

		//linhas recebe todas as tuplas retornadas do banco		
		$linhas = $statement->fetchAll();
		
		//Verifico se houve algum retorno, senão retorno null
		if(count($linhas)==0)
				return null;

		//Var que irá armazenar um array de obj do tipo funcionário
		$funcionarios;		
		
		foreach ($linhas as $value) {
			$funcionario = new ModelFuncionario();
			$funcionario->setFuncionarioFromDataBase($value);			
			$funcionarios[]=$funcionario;
		}	
		return $funcionarios;		
	}
	//Retorna 1 se conseguiu inserir;
	function setFuncionario($func){			

		try {
			//monto a query
            $sql = "INSERT INTO funcionario (		
                idFuncionario,
                nome,
                salario,
                login,
                senha,
                idPermissao,
                idDepartamento) 
                VALUES (
                :idFuncionario,
                :nome,
                :salario,
                :login,
                :senha,
                :idPermissao,
                :idDepartamento)"
        	;

            //pego uma ref da conexão
			$instance = DatabaseConnection::getInstance();
			$conn = $instance->getConnection();
			//Utilizando Prepared Statements
			$statement = $conn->prepare($sql);

            $statement->bindValue(":idFuncionario", $func->getIdFuncionario());
            $statement->bindValue(":nome", $func->getNome());
            $statement->bindValue(":salario", $func->getSalario());
            $statement->bindValue(":login", $func->getLogin());
            $statement->bindValue(":senha", $func->getSenha());
            $statement->bindValue(":idPermissao", $func->getIdPermissao());
            $statement->bindValue(":idDepartamento", $func->getIdDepartamento());
            return $statement->execute();

        } catch (PDOException $e) {
            echo "Erro ao inserir na base de dados.".$e->getMessage();
        }		
	}
}