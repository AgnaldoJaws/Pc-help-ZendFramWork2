<?php

namespace Pc_help\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\AbstractTableGateway;


class ClienteTable extends AbstractTableGateway{
	
	protected $table = "cliente";
	
	public function __construct(Adapter $adapter){
		
		$this->adapter = $adapter;
		$this->resultSetPrototype = new ResultSet();
		$this->resultSetPrototype->setArrayObjectPrototype(new Cliente());
		$this->initialize();
		
	}
	
}