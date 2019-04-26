<?php

include_once $_SESSION["root"].'php/DAO/FuncionarioDAO.php';
include_once $_SESSION["root"].'php/Model/ModelFuncionario.php';

class ControllerFuncionario {
	function getAllFuncionarios(){
		$funcDAO = new FuncionarioDAO();
		$funcionarios=$funcDAO->getAllFuncionarios();
		include_once $_SESSION["root"].'php/View/ViewExibeFuncionarios.php';
	}
	function setFuncionario(){
		$funcDAO = new FuncionarioDAO();
		$funcionario = new ModelFuncionario();
		$funcionario->setFuncionarioFromPOST();
		$resultadoInsercao = $funcDAO->setFuncionario($funcionario);
			
		if($resultadoInsercao){
			$_SESSION["flash"]["msg"]="Funcionário Cadastrado com Sucesso";
			$_SESSION["flash"]["sucesso"]=true;			
		}
		else{
			$_SESSION["flash"]["msg"]="O Login já existe no banco";
			$_SESSION["flash"]["sucesso"]=false;
			//Var temp de feedback	
			$_SESSION["flash"]["nome"]=$funcionario->getNome();
			$_SESSION["flash"]["login"]=$funcionario->getLogin();
			$_SESSION["flash"]["salario"]=$funcionario->getSalario();
		}
		include_once $_SESSION["root"].'php/View/ViewCadastraFuncionario.php';
	}
}