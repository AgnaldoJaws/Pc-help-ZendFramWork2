<?php
namespace Pc_help\Model;

class ClienteService {
	
	
	/**
	 * @var Pc_help\Model\ClienteTable
	 */
	
	protected $clienteTable;
	
	public function __construct(ClienteTable $table){
		
		$this->clienteTable = $table;
		
	}
	
	public function fetchAll (){
	$resultSet = $this->clienteTable->select();
	return $resultSet;	
		
		
	}
}