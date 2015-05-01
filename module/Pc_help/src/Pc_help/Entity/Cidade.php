<?php

namespace Pc_help\Entity;

use Livraria\Entity\Configurator;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Entity
 * @ORM\Table(name="cidade")
 *
 */
class Cidade {
	
	
	public function __construct($options = null){
	
		Configurator::configure($this, $options);
		$this->clientes = new ArrayCollection();
	}
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 * @var int
	 */
	
	protected $id_cidade;
	
	
	/**
	 * @ORM\Column(type="string")
	 * @var string
	 */
	
	protected $nome_cidade;
	
	/**
	 *@ORM\OneTomany(targetEntity="Pc_help\Entity\Cliente, mappedBy="cidade")
	 */
	protected $clientes;
	
	
	
	
	
	
	public function getId_cidade()
	{
		return $this->id_cidade;
	}
	
	public function setId_cidade($id_cidade)
	{
		$this->id_cidade = $id_cidade;
		return $this;
	
	
	
	}
	
	
	public function getNome_cidade()
	{
		return $this->nome_cidade;
	}
		
	public function setNome_cidade($nome_cidade)
	{
		$this->nome_cidade = $nome_cidade;
		return $this;
	}

	public function getClientes()
	{
	    return $this->clientes;
	}

	
	
	public function toArray (){
		
		return array('id_cidade'=>$this->getId_cidade());
		
		
	}
}
