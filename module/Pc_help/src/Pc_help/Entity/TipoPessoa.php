<?php

namespace Pc_help\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tipo_pessoa")
  */
class TipoPessoa {
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 * @var int
	 */
	
	protected  $id_tipo_pessoa ;
	
	/**
	 * @ORM\Column(type="text")
	 * @var string
	 */
	protected  $tipo_pessoa;
	
	
	
	public function getId_tipo_pessoa()
	{
		return $this->id_tipo_pessoa;
	}
	
	public function setId_tipo_pessoa($id_tipo_pessoa)
	{
		$this->id_tipo_pessoa = $id_tipo_pessoa;
		return $this;
	}
	
	
	public function getTipo_pessoa()
	{
		return $this->tipo_pessoa;
	}
	
	public function setTipo_pessoa($tipo_pessoa)
	{
		$this->tipo_pessoa = $tipo_pessoa;
		return $this;
	}
	
	
}
