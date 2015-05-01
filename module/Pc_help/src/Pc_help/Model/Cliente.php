<?php

namespace Pc_help\Model;
use Pc_help\Entity\Configurator;
use Pc_help\Entity\Cliente;

class Cliente {
	
	public $cod_cli;
	
	public $nome_cliente;
	
	public function exchangeArray ($data){
		
		$this->cod_cli = (isset($data['cod_cli'])) ? $data['cod_cli'] : null;
		$this->nome_cliente = (isset($data['nome_cliente'])) ? $data['nome_cliente'] : null;
		
	}
	
	
	
	
}